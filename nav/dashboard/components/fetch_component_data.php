<?php
require_once '../../../connection.php';

// Function to get total ROTC and CWTS students for a specified academic year and semester
function getRotcCwtsTotals($conn, $academicYear, $semester) {
    // Prepare the query to get total students based on the selected academic year and semester
    $query = $conn->prepare("
        SELECT 
            SUM(CASE WHEN (semester1 = 'ROTC1' AND academicyear1 = :academicYear AND :semester = 'First') 
                      OR (semester2 = 'ROTC2' AND academicyear2 = :academicYear AND :semester = 'Second') THEN 1 ELSE 0 END) AS total_rotc,
            SUM(CASE WHEN (semester1 = 'CWTS1' AND academicyear1 = :academicYear AND :semester = 'First') 
                      OR (semester2 = 'CWTS2' AND academicyear2 = :academicYear AND :semester = 'Second') THEN 1 ELSE 0 END) AS total_cwts
        FROM studentInformation_view
    ");

    // Bind parameters for academic year and semester
    $query->bindParam(':academicYear', $academicYear);
    $query->bindParam(':semester', $semester);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Get parameters from the request
$academicYear = isset($_GET['year']) ? $_GET['year'] : null;
$semester = isset($_GET['semester']) ? $_GET['semester'] : null;

// If parameters are provided, fetch the totals; otherwise, return an error message
if ($academicYear && $semester) {
    $result = getRotcCwtsTotals($conn, $academicYear, $semester);
    echo json_encode([
        'total_rotc' => $result['total_rotc'] ?? 0,
        'total_cwts' => $result['total_cwts'] ?? 0
    ]);
} else {
    echo json_encode([
        'error' => 'Missing academic year or semester parameter'
    ]);
}
