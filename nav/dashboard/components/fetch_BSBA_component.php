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

    // Modify the query to fetch total students enrolled in ROTC and CWTS for BSBA only
    $query = $conn->prepare("
        SELECT 
            SUM(CASE WHEN nstp.semester1 = 'ROTC1' OR nstp.semester2 = 'ROTC2' THEN 1 ELSE 0 END) AS rotc_total,
            SUM(CASE WHEN nstp.semester1 = 'CWTS1' OR nstp.semester2 = 'CWTS2' THEN 1 ELSE 0 END) AS cwts_total
        FROM tblstudent AS student
        JOIN tblnstp AS nstp ON student.student_id = nstp.student_id
        WHERE (nstp.academicyear1 = :selectedYear OR nstp.academicyear2 = :selectedYear)
        AND (
            (nstp.semester1 IN ('ROTC1', 'CWTS1') AND :semester = 'First') OR 
            (nstp.semester2 IN ('ROTC2', 'CWTS2') AND :semester = 'Second')
        )
        AND student.department IN ('Bachelor of Science in Business Administration', 'BSBA')
    ");

    $query->execute([
        'selectedYear' => $selectedYear,
        'semester' => $selectedSemester
    ]);

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Fetch the total for ROTC and CWTS
        $rotc_total = (int)$result['rotc_total'];
        $cwts_total = (int)$result['cwts_total'];

        // Prepare the data for comparison
        $data = [
            ['ROTC Total', $rotc_total],
            ['CWTS Total', $cwts_total]
        ];

        // Return the data as JSON
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'No data found for the selected academic year and semester.']);
    }

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
