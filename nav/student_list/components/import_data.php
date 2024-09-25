<?php
require '../../../connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        // Load the PHPExcel library (install via Composer or download)
        require '../nav/student_list/excelReader/excel_reader2.php';
        require '../nav/student_list/excelReader/SpreadsheetReader_CSV.php';
        require '../nav/student_list/excelReader/SpreadsheetReader_ODS.php';
        require '../nav/student_list/excelReader/SpreadsheetReader_XLS.php';
        require '../nav/student_list/excelReader/SpreadsheetReader_XLSX.php';
        require '../nav/student_list/excelReader/SpreadsheetReader.php';

        // Load the Excel file
        $objPHPExcel = PHPExcel_IOFactory::load($fileTmpPath);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

        foreach ($sheetData as $row) {
            // Assuming the first row contains the header
            // Skip the first row if it contains column headers
            if ($row['A'] === 'Student ID') {
                continue;
            }

            // Map the row data to the database columns
            $studentId = $row['A'];
            $firstName = $row['B'];
            $middleName = $row['C'];
            $lastName = $row['D'];
            $suffixName = $row['E'];
            $gender = $row['F'];
            $semester1 = $row['G'];
            $sectionCode1 = $row['H'];
            $school1 = $row['I'];
            $academicYear1 = $row['J'];
            $semester2 = $row['K'];
            $sectionCode2 = $row['L'];
            $school2 = $row['M'];
            $academicYear2 = $row['N'];
            $serialNumber = $row['O'];
            $remarks = $row['P'];

            // Prepare the SQL statement for insert or update
            $stmt = $conn->prepare("
                INSERT INTO masterlist_view 
                (student_id, firstname, middlename, lastname, suffixname, gender, semester1, sectioncode1, school1, academicyear1, semester2, sectioncode2, school2, academicyear2, serialnumber, remarks) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE 
                firstname = VALUES(firstname), 
                middlename = VALUES(middlename), 
                lastname = VALUES(lastname), 
                suffixname = VALUES(suffixname), 
                gender = VALUES(gender), 
                semester1 = VALUES(semester1), 
                sectioncode1 = VALUES(sectioncode1), 
                school1 = VALUES(school1), 
                academicyear1 = VALUES(academicyear1), 
                semester2 = VALUES(semester2), 
                sectioncode2 = VALUES(sectioncode2), 
                school2 = VALUES(school2), 
                academicyear2 = VALUES(academicyear2), 
                serialnumber = VALUES(serialnumber), 
                remarks = VALUES(remarks)");
            
            // Bind parameters
            $stmt->bind_param("isssssssssssssss", 
                $studentId, 
                $firstName, 
                $middleName, 
                $lastName, 
                $suffixName, 
                $gender, 
                $semester1, 
                $sectionCode1, 
                $school1, 
                $academicYear1, 
                $semester2, 
                $sectionCode2, 
                $school2, 
                $academicYear2, 
                $serialNumber, 
                $remarks
            );
            
            // Execute the statement
            if (!$stmt->execute()) {
                // Handle error if any
                error_log("Database error: " . $stmt->error);
            }
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'File upload failed.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
