<?php
require_once '../../../connection.php';

header('Content-Type: application/json');

// Fetch the latest academic year from the database
$yearQuery = $conn->query("SELECT MAX(academicyear1) AS latest_year FROM studentinformation_view");
$latestYearRow = $yearQuery->fetch(PDO::FETCH_ASSOC);
$academicYear = $latestYearRow['latest_year'] ?? null; // Use the latest year or null if not found

// If no academic year is found, you can decide how to handle it
if (!$academicYear) {
    // Handle the case where no academic year is available
    echo json_encode(['error' => 'No academic year available.']);
    exit;
}

// Mapping program names to abbreviations
$programMap = [
    'Bachelor of Science in Information Technology' => 'BSIT',
    'Bachelor of Science in Business Administration' => 'BSBA',
    'Teacher Education Program' => 'TEP'
];

// Initialize the totals for each program, semester, and gender
$totals = [
    'BSBA' => ['semester1' => ['MALE' => 0, 'FEMALE' => 0], 'semester2' => ['MALE' => 0, 'FEMALE' => 0]],
    'BSIT' => ['semester1' => ['MALE' => 0, 'FEMALE' => 0], 'semester2' => ['MALE' => 0, 'FEMALE' => 0]],
    'TEP'  => ['semester1' => ['MALE' => 0, 'FEMALE' => 0], 'semester2' => ['MALE' => 0, 'FEMALE' => 0]]
];

// Query the database to get gender counts per program, academic year, and semester
$query = $conn->prepare("SELECT program, gender, semester1, semester2
                         FROM studentinformation_view
                         WHERE academicyear1 = :academicYear OR academicyear2 = :academicYear");
$query->bindParam(':academicYear', $academicYear);
$query->execute();

// Process the query results and accumulate totals based on semesters
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $program = $row['program'];
    $gender = strtoupper($row['gender']); // Normalize gender to uppercase

    if (isset($programMap[$program])) {
        $programAbbr = $programMap[$program];

        // Count for the first semester if present
        if (!empty($row['semester1'])) {
            $totals[$programAbbr]['semester1'][$gender]++;
        }

        // Count for the second semester if present
        if (!empty($row['semester2'])) {
            $totals[$programAbbr]['semester2'][$gender]++;
        }
    }
}

// Calculate grand totals for both semesters across all programs
$grandTotals = [
    'semester1' => [
        'MALE' => $totals['BSBA']['semester1']['MALE'] + $totals['BSIT']['semester1']['MALE'] + $totals['TEP']['semester1']['MALE'],
        'FEMALE' => $totals['BSBA']['semester1']['FEMALE'] + $totals['BSIT']['semester1']['FEMALE'] + $totals['TEP']['semester1']['FEMALE']
    ],
    'semester2' => [
        'MALE' => $totals['BSBA']['semester2']['MALE'] + $totals['BSIT']['semester2']['MALE'] + $totals['TEP']['semester2']['MALE'],
        'FEMALE' => $totals['BSBA']['semester2']['FEMALE'] + $totals['BSIT']['semester2']['FEMALE'] + $totals['TEP']['semester2']['FEMALE']
    ]
];

// Determine the latest semester (if data exists in both semesters, consider both)
$latestData = [];
if (array_sum($grandTotals['semester2']) > 0) {
    // Both semesters exist, so return the second semester data
    $latestData = [
        'all' => ['male' => $grandTotals['semester2']['MALE'], 'female' => $grandTotals['semester2']['FEMALE']],
        'bsit' => ['male' => $totals['BSIT']['semester2']['MALE'], 'female' => $totals['BSIT']['semester2']['FEMALE']],
        'bsba' => ['male' => $totals['BSBA']['semester2']['MALE'], 'female' => $totals['BSBA']['semester2']['FEMALE']],
        'tep' => ['male' => $totals['TEP']['semester2']['MALE'], 'female' => $totals['TEP']['semester2']['FEMALE']]
    ];
} else {
    // Only the first semester data is present
    $latestData = [
        'all' => ['male' => $grandTotals['semester1']['MALE'], 'female' => $grandTotals['semester1']['FEMALE']],
        'bsit' => ['male' => $totals['BSIT']['semester1']['MALE'], 'female' => $totals['BSIT']['semester1']['FEMALE']],
        'bsba' => ['male' => $totals['BSBA']['semester1']['MALE'], 'female' => $totals['BSBA']['semester1']['FEMALE']],
        'tep' => ['male' => $totals['TEP']['semester1']['MALE'], 'female' => $totals['TEP']['semester1']['FEMALE']]
    ];
}

// Return the data in JSON format for the chart
echo json_encode($latestData);
?>
