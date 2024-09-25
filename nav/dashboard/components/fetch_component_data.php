<?php
require_once '../../../connection.php';

// Function to get total ROTC and CWTS students for the latest academic year
function getRotcCwtsTotals($conn) {
    // Get the latest academic year
    $queryLatestYear = $conn->query("SELECT MAX(GREATEST(academicyear1, academicyear2)) AS latest_year 
                                     FROM studentInformation_view");
    $latestYearRow = $queryLatestYear->fetch(PDO::FETCH_ASSOC);
    $latestAcademicYear = $latestYearRow['latest_year'];

    // Query to get the total number of students in ROTC and CWTS
    $query = $conn->prepare("
        SELECT 
            SUM(CASE WHEN semester1 = 'ROTC1' OR semester2 = 'ROTC2' THEN 1 ELSE 0 END) AS total_rotc,
            SUM(CASE WHEN semester1 = 'CWTS1' OR semester2 = 'CWTS2' THEN 1 ELSE 0 END) AS total_cwts
        FROM studentInformation_view
        WHERE academicyear1 = :academicYear OR academicyear2 = :academicYear");

    $query->bindParam(':academicYear', $latestAcademicYear);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Call the function and return the result as JSON
$result = getRotcCwtsTotals($conn);
echo json_encode([
    'total_rotc' => $result['total_rotc'],
    'total_cwts' => $result['total_cwts']
]);
