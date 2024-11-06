<?php
// PHP function to output the ROTC and CWTS comparison as JSON
function fetchGraduatesComparison() {
    include('../../../connection.php'); // Update the connection path if necessary

    try {
        // SQL query to count ROTC and CWTS graduates by academic year directly from tblnstp and tblstudent tables
        $sql = "
            SELECT
                tblnstp.academicyear2 AS academic_year,
                COUNT(CASE WHEN tblnstp.semester1 = 'ROTC1' OR tblnstp.semester2 = 'ROTC2' THEN 1 END) AS ROTC_graduates,
                COUNT(CASE WHEN tblnstp.semester1 = 'CWTS1' OR tblnstp.semester2 = 'CWTS2' THEN 1 END) AS CWTS_graduates
            FROM
                tblnstp
            INNER JOIN
                tblstudent ON tblnstp.student_id = tblstudent.student_id
            WHERE
                tblstudent.serialnumber IS NOT NULL
            GROUP BY
                tblnstp.academicyear2
            ORDER BY
                tblnstp.academicyear2 ASC;
        ";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch results
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Output the result as JSON
        echo json_encode($result);

    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

// Call the function to return the JSON data
fetchGraduatesComparison();
?>
