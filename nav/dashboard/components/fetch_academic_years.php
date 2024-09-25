<?php
// Include your database connection
include '../../../connection.php';

try {
    // Fetch all academic years for the dropdown
    $yearQuery = "SELECT DISTINCT academicyear1 AS academic_year FROM tblnstp ORDER BY academicyear1 DESC";
    $stmt = $conn->prepare($yearQuery);
    $stmt->execute();
    $academicYears = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Fetch the latest semester (if available)
    $semesterQuery = "SELECT CASE WHEN COUNT(*) > 0 THEN 'Second' ELSE 'First' END AS latest_semester FROM tblnstp WHERE academicyear2 = :latestYear";
    $stmt = $conn->prepare($semesterQuery);
    $stmt->execute(['latestYear' => $academicYears[0]]);
    $latestSemester = $stmt->fetchColumn();

    // Return the data as JSON
    echo json_encode([
        'academic_years' => $academicYears,
        'latest_semester' => $latestSemester
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
