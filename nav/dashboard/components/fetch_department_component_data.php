<?php
require_once '../../../connection.php';

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

    // Fetch the latest semester data
    $latestSemesterQuery = "
        SELECT DISTINCT semester1, semester2
        FROM tblnstp
        WHERE academicyear1 = :latestYear OR academicyear2 = :latestYear
    ";
    $stmt = $conn->prepare($latestSemesterQuery);
    $stmt->execute(['latestYear' => $latestAcademicYear]);
    $semesters = $stmt->fetch(PDO::FETCH_ASSOC);

    // Determine the latest semester
    $selectedSemester = 'First'; // Default to 'First'
    if (!empty($semesters['semester2'])) {
        $selectedSemester = 'Second'; // Use 'Second' if available
    }

    // Modify the query to fetch total students enrolled in ROTC and CWTS for each program based on the latest year and semester
    $query = $conn->prepare("
        SELECT 
            program, 
            SUM(CASE WHEN semester1 = 'ROTC1' OR semester2 = 'ROTC2' THEN 1 ELSE 0 END) AS rotc_total,
            SUM(CASE WHEN semester1 = 'CWTS1' OR semester2 = 'CWTS2' THEN 1 ELSE 0 END) AS cwts_total
        FROM studentInformation_view
        WHERE (semester1 IN ('ROTC1', 'CWTS1') OR semester2 IN ('ROTC2', 'CWTS2'))
        AND (academicyear1 = :latestYear OR academicyear2 = :latestYear)
        GROUP BY program
    ");
    $query->execute(['latestYear' => $latestAcademicYear]);

    $data = [];

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $program = $row['program'];
        $rotc_total = $row['rotc_total'];
        $cwts_total = $row['cwts_total'];

        // Add the totals for each program
        $data[] = [$program . ' (ROTC)', (int)$rotc_total];
        $data[] = [$program . ' (CWTS)', (int)$cwts_total];
    }

    // Return the data as JSON
    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
