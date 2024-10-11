<?php
// Include your existing database connection
include '../../../connection.php'; // Update with the correct path to your connection script

try {
    // Fetch the latest academic year
    $latestYearQuery = "
        SELECT DISTINCT academicyear1 AS academic_year
        FROM tblnstp
        ORDER BY academicyear1 DESC
        LIMIT 1
    ";
    $stmt = $conn->prepare($latestYearQuery);
    $stmt->execute();
    $latestAcademicYear = $stmt->fetchColumn();

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
    $selectedYear = isset($_GET['year']) && !empty($_GET['year']) ? $_GET['year'] : $latestAcademicYear; // Default to the latest if not provided
    $selectedSemester = isset($_GET['semester']) && !empty($_GET['semester']) ? $_GET['semester'] : 'First'; // Default to First if not provided

    // Determine the ROTC/CWTS components based on the selected semester
    if ($selectedSemester === 'First') {
        $semester = 'semester1';
        $rotn = ['ROTC1', 'CWTS1'];
    } else {
        $semester = 'semester2';
        $rotn = ['ROTC2', 'CWTS2'];
    }

    // Fetch enrolled students in BSIT for the selected semester
    $bsitQuery = "
        SELECT COUNT(DISTINCT student_id) AS total
        FROM tblstudent
        WHERE department IN ('Bachelor of Science in Information Technology', 'BSIT') 
          AND student_id IN (
            SELECT student_id 
            FROM tblnstp 
            WHERE (academicyear1 = :selectedYear AND semester1 IN ('" . implode("', '", $rotn) . "'))
            OR (academicyear2 = :selectedYear AND semester2 IN ('" . implode("', '", $rotn) . "'))
          )
    ";
    $stmt = $conn->prepare($bsitQuery);
    $stmt->execute(['selectedYear' => $selectedYear]);
    $bsit_enrolled = $stmt->fetchColumn();

    // Fetch enrolled students in BSBA for the selected semester
    $bsbaQuery = "
        SELECT COUNT(DISTINCT student_id) AS total
        FROM tblstudent
        WHERE department IN ('Bachelor of Science in Business Administration', 'BSBA')
          AND student_id IN (
            SELECT student_id 
            FROM tblnstp 
            WHERE (academicyear1 = :selectedYear AND semester1 IN ('" . implode("', '", $rotn) . "'))
            OR (academicyear2 = :selectedYear AND semester2 IN ('" . implode("', '", $rotn) . "'))
          )
    ";
    $stmt = $conn->prepare($bsbaQuery);
    $stmt->execute(['selectedYear' => $selectedYear]);
    $bsba_enrolled = $stmt->fetchColumn();

    // Fetch enrolled students in TEP for the selected semester
    $tepQuery = "
        SELECT COUNT(DISTINCT student_id) AS total
        FROM tblstudent
        WHERE department IN ('Teacher Education Program', 'TEP')
          AND student_id IN (
            SELECT student_id 
            FROM tblnstp 
            WHERE (academicyear1 = :selectedYear AND semester1 IN ('" . implode("', '", $rotn) . "'))
            OR (academicyear2 = :selectedYear AND semester2 IN ('" . implode("', '", $rotn) . "'))
          )
    ";
    $stmt = $conn->prepare($tepQuery);
    $stmt->execute(['selectedYear' => $selectedYear]);
    $tep_enrolled = $stmt->fetchColumn();

    // Return the data as JSON
    echo json_encode([
        'academic_years' => $academicYears,
        'bsit_enrolled' => $bsit_enrolled,
        'bsba_enrolled' => $bsba_enrolled,
        'tep_enrolled' => $tep_enrolled,
        'selected_year' => $selectedYear,
        'selected_semester' => $selectedSemester
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
