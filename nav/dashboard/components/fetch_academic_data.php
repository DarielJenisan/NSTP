<?php
// Include your existing database connection
include '../../../connection.php'; // Update with the correct path to your connection script

try {
    // Fetch all academic years for the dropdown
    $yearQuery = "
        SELECT DISTINCT academicyear1 AS academic_year
        FROM tblnstp
        ORDER BY academicyear1 DESC
    ";
    $stmt = $conn->prepare($yearQuery);
    $stmt->execute();
    $academicYears = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Get selected academic year and semester from the request
    $selectedYear = isset($_GET['year']) ? $_GET['year'] : end($academicYears); // Default to the latest if not provided
    $selectedSemester = isset($_GET['semester']) ? $_GET['semester'] : 'First'; // Default to First if not provided

    // Fetch total enrolled students for the selected semester (ROTC1, CWTS1 for First; ROTC2, CWTS2 for Second)
    $semesterColumn = ($selectedSemester === 'First') ? 'semester1' : 'semester2';
    $enrollmentCountQuery = "
        SELECT COUNT(*) AS total
        FROM tblnstp
        WHERE academicyear1 = :selectedYear
        AND $semesterColumn IN ('ROTC1', 'CWTS1') 
    ";
    
    // For the second semester, we need to adjust the query
    if ($selectedSemester === 'Second') {
        $enrollmentCountQuery = "
            SELECT COUNT(*) AS total
            FROM tblnstp
            WHERE academicyear2 = :selectedYear
            AND $semesterColumn IN ('ROTC2', 'CWTS2') 
        ";
    }
    
    $stmt = $conn->prepare($enrollmentCountQuery);
    $stmt->execute(['selectedYear' => $selectedYear]);
    $totalEnrolled = $stmt->fetchColumn();

    // Return data as JSON
    echo json_encode([
        'academic_years' => $academicYears, // List of academic years
        'total_enrolled' => $totalEnrolled,
        'selected_year' => $selectedYear,
        'selected_semester' => $selectedSemester
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
