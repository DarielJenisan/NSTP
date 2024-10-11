<?php
require_once '../../../connection.php';

try {
    // Get the selected year and semester from query parameters
    $selectedYear = $_GET['year'] ?? null; // Default to null if not provided
    $selectedSemester = $_GET['semester'] ?? 'First'; // Default to 'First' if not provided

    // Validate that the selected year is provided
    if (!$selectedYear) {
        throw new Exception("Academic year is required.");
    }

    // Modify the query to fetch total students enrolled in ROTC and CWTS for each department based on the selected year and semester
    $query = $conn->prepare("
        SELECT 
            department, 
            SUM(CASE WHEN semester1 = 'ROTC1' OR semester2 = 'ROTC2' THEN 1 ELSE 0 END) AS rotc_total,
            SUM(CASE WHEN semester1 = 'CWTS1' OR semester2 = 'CWTS2' THEN 1 ELSE 0 END) AS cwts_total
        FROM studentInformation_view
        WHERE (academicyear1 = :selectedYear OR academicyear2 = :selectedYear)
        AND (
            (semester1 IN ('ROTC1', 'CWTS1') AND :semester = 'First') OR 
            (semester2 IN ('ROTC2', 'CWTS2') AND :semester = 'Second')
        )
        GROUP BY department
    ");

    $query->execute([
        'selectedYear' => $selectedYear,
        'semester' => $selectedSemester
    ]);

    $data = [];

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $department = $row['department'];
        $rotc_total = $row['rotc_total'];
        $cwts_total = $row['cwts_total'];

        // Add the totals for each department
        $data[] = [$department . ' (ROTC)', (int)$rotc_total];
        $data[] = [$department . ' (CWTS)', (int)$cwts_total];
    }

    // Return the data as JSON
    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
