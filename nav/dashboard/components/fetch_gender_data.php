<?php
require_once '../../../connection.php';

header('Content-Type: application/json');

// Get the academic year and semester from the POST request
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);
$selectedAcademicYear = $data['academicYear'] ?? null;
$selectedSemester = strtolower($data['semester']) ?? null; // 'first' or 'second'

// If no academic year is selected, fetch the latest academic year from the database
if (!$selectedAcademicYear) {
    $yearQuery = $conn->query("SELECT MAX(academicyear1) AS latest_year FROM studentinformation_view");
    $latestYearRow = $yearQuery->fetch(PDO::FETCH_ASSOC);
    $selectedAcademicYear = $latestYearRow['latest_year'] ?? null;
}

// If no academic year is found, handle it gracefully
if (!$selectedAcademicYear) {
    echo json_encode(['error' => 'No academic year available.']);
    exit;
}

// Mapping program names to abbreviations
$programMap = [
    'Bachelor of Science in Information Technology' => 'BSIT',
    'Bachelor of Science in Business Administration' => 'BSBA',
    'Teacher Education Program' => 'TEP'
];

// Initialize totals for each program, gender, and semester
$totals = [
    'BSBA' => ['MALE' => 0, 'FEMALE' => 0],
    'BSIT' => ['MALE' => 0, 'FEMALE' => 0],
    'TEP'  => ['MALE' => 0, 'FEMALE' => 0]
];

// Construct the semester column dynamically based on the selected semester
$semesterColumn = $selectedSemester === 'second' ? 'semester2' : 'semester1';

// Query the database for gender counts based on the selected academic year and semester
$query = $conn->prepare("SELECT program, gender, $semesterColumn AS semester
                         FROM studentinformation_view
                         WHERE academicyear1 = :academicYear OR academicyear2 = :academicYear");
$query->bindParam(':academicYear', $selectedAcademicYear);
$query->execute();

// Process the results and accumulate totals
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $program = $row['program'];
    $gender = strtoupper($row['gender']); // Normalize gender to uppercase

    if (isset($programMap[$program]) && !empty($row['semester'])) {
        $programAbbr = $programMap[$program];
        $totals[$programAbbr][$gender]++;
    }
}

// Calculate grand totals across all programs for the selected semester
$grandTotals = [
    'MALE' => $totals['BSBA']['MALE'] + $totals['BSIT']['MALE'] + $totals['TEP']['MALE'],
    'FEMALE' => $totals['BSBA']['FEMALE'] + $totals['BSIT']['FEMALE'] + $totals['TEP']['FEMALE']
];

// Prepare the data to return as JSON
$responseData = [
    'all' => ['male' => $grandTotals['MALE'], 'female' => $grandTotals['FEMALE']],
    'bsit' => ['male' => $totals['BSIT']['MALE'], 'female' => $totals['BSIT']['FEMALE']],
    'bsba' => ['male' => $totals['BSBA']['MALE'], 'female' => $totals['BSBA']['FEMALE']],
    'tep' => ['male' => $totals['TEP']['MALE'], 'female' => $totals['TEP']['FEMALE']]
];

// Return the data as JSON
echo json_encode($responseData);
?>
