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
    $yearQuery = $conn->query("SELECT MAX(academicyear1) AS latest_year FROM tblnstp");
    $latestYearRow = $yearQuery->fetch(PDO::FETCH_ASSOC);
    $selectedAcademicYear = $latestYearRow['latest_year'] ?? null;
}

// If no academic year is found, handle it gracefully
if (!$selectedAcademicYear) {
    echo json_encode(['error' => 'No academic year available.']);
    exit;
}

// Mapping department names to abbreviations
$departmentMap = [
    'Bachelor of Science in Information Technology' => 'BSIT',
    'Bachelor of Science in Business Administration' => 'BSBA',
    'Teacher Education Program' => 'TEP'
];

// Initialize totals for each department, gender, and semester
$totals = [
    'BSBA' => ['MALE' => 0, 'FEMALE' => 0],
    'BSIT' => ['MALE' => 0, 'FEMALE' => 0],
    'TEP'  => ['MALE' => 0, 'FEMALE' => 0]
];

// Construct the semester column dynamically based on the selected semester
$semesterColumn = $selectedSemester === 'second' ? 'semester2' : 'semester1';

// Query the database for gender counts based on the selected academic year and semester
$query = $conn->prepare("SELECT s.department, s.gender, n.$semesterColumn AS semester
                         FROM tblstudent s
                         JOIN tblnstp n ON s.student_id = n.student_id
                         WHERE n.academicyear1 = :academicYear OR n.academicyear2 = :academicYear");
$query->bindParam(':academicYear', $selectedAcademicYear);
$query->execute();

// Process the results and accumulate totals
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $department = $row['department'];
    $gender = strtoupper($row['gender']); // Normalize gender to uppercase

    if (isset($departmentMap[$department]) && !empty($row['semester'])) {
        $departmentAbbr = $departmentMap[$department];
        $totals[$departmentAbbr][$gender]++;
    }
}

// Calculate grand totals across all departments for the selected semester
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
