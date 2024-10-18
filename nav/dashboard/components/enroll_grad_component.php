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

    // Modify the query to fetch the enrolled and completion status (completers, failed, drop) counts
    $query = $conn->prepare("
        SELECT 
            -- Count students enrolled in ROTC based on sectioncode1 or sectioncode2
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'ROTC1' AND :semester = 'First') 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'ROTC2' AND :semester = 'Second') 
                      THEN 1 ELSE 0 END) AS rotc_total_enrolled,
                      
            -- Count students enrolled in CWTS based on sectioncode1 or sectioncode2
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'CWTS1' AND :semester = 'First') 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'CWTS2' AND :semester = 'Second') 
                      THEN 1 ELSE 0 END) AS cwts_total_enrolled,
                      
            -- Count ROTC completers (students with grade1 between 1.00 and 3.00 for first semester)
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'ROTC1' AND :semester = 'First' AND (grade1 BETWEEN 1.00 AND 3.00)) 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'ROTC2' AND :semester = 'Second' AND (grade2 BETWEEN 1.00 AND 3.00)) 
                      THEN 1 ELSE 0 END) AS rotc_completers,
                      
            -- Count CWTS completers (students with grade1 between 1.00 and 3.00 for first semester)
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'CWTS1' AND :semester = 'First' AND (grade1 BETWEEN 1.00 AND 3.00)) 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'CWTS2' AND :semester = 'Second' AND (grade2 BETWEEN 1.00 AND 3.00)) 
                      THEN 1 ELSE 0 END) AS cwts_completers,

            -- Count ROTC failed (students with grade1 greater than 3 for first semester)
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'ROTC1' AND :semester = 'First' AND (grade1 > 3.00)) 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'ROTC2' AND :semester = 'Second' AND (grade2 > 3.00)) 
                      THEN 1 ELSE 0 END) AS rotc_failed,

            -- Count CWTS failed (students with grade1 greater than 3 for first semester)
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'CWTS1' AND :semester = 'First' AND (grade1 > 3.00)) 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'CWTS2' AND :semester = 'Second' AND (grade2 > 3.00)) 
                      THEN 1 ELSE 0 END) AS cwts_failed,

            -- Count ROTC drop (students with grade1 being 0.99 or null for first semester)
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'ROTC1' AND :semester = 'First' AND (grade1 = 0.99 OR grade1 IS NULL)) 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'ROTC2' AND :semester = 'Second' AND (grade2 = 0.99 OR grade2 IS NULL)) 
                      THEN 1 ELSE 0 END) AS rotc_drop,

            -- Count CWTS drop (students with grade1 being 0.99 or null for first semester)
            SUM(CASE WHEN (sectioncode1 IS NOT NULL AND semester1 = 'CWTS1' AND :semester = 'First' AND (grade1 = 0.99 OR grade1 IS NULL)) 
                      OR (sectioncode2 IS NOT NULL AND semester2 = 'CWTS2' AND :semester = 'Second' AND (grade2 = 0.99 OR grade2 IS NULL)) 
                      THEN 1 ELSE 0 END) AS cwts_drop
                      
        FROM studentInformation_view
        WHERE (academicyear1 = :selectedYear OR academicyear2 = :selectedYear)
    ");

    $query->execute([
        'selectedYear' => $selectedYear,
        'semester' => $selectedSemester
    ]);

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Fetch the totals for ROTC and CWTS based on section codes
        $rotc_total_enrolled = (int)$result['rotc_total_enrolled'] ?? 0;
        $cwts_total_enrolled = (int)$result['cwts_total_enrolled'] ?? 0;
        
        // Fetch the completers, failed, and dropouts for ROTC and CWTS
        $rotc_completers = (int)$result['rotc_completers'] ?? 0;
        $cwts_completers = (int)$result['cwts_completers'] ?? 0;
        $rotc_failed = (int)$result['rotc_failed'] ?? 0;
        $cwts_failed = (int)$result['cwts_failed'] ?? 0;
        $rotc_drop = (int)$result['rotc_drop'] ?? 0;
        $cwts_drop = (int)$result['cwts_drop'] ?? 0;

        // Prepare the data as an associative array
        $data = [
            'rotc_total_enrolled' => $rotc_total_enrolled,
            'cwts_total_enrolled' => $cwts_total_enrolled,
            'rotc_completers' => $rotc_completers,
            'cwts_completers' => $cwts_completers,
            'rotc_failed' => $rotc_failed,
            'cwts_failed' => $cwts_failed,
            'rotc_drop' => $rotc_drop,
            'cwts_drop' => $cwts_drop
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
