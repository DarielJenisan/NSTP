<?php
// Include your database connection
include '../../../connection.php';

header('Content-Type: application/json');
$inputData = json_decode(file_get_contents('php://input'), true);

if ($inputData) {
    $successCount = 0;
    $errorCount = 0;

    foreach ($inputData as $student) {
        // Prepare your SQL insert statement
        $stmt = $conn->prepare("INSERT INTO tblstudent (firstname, middlename, lastname, suffixname, gender, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $student['firstname']);
        $stmt->bindParam(2, $student['middlename']);
        $stmt->bindParam(3, $student['lastname']);
        $stmt->bindParam(4, $student['suffixname']);
        $stmt->bindParam(5, $student['gender']);
        $stmt->bindParam(6, $student['email']);
        
        if ($stmt->execute()) {
            $successCount++;
        } else {
            $errorCount++;
        }
    }

    echo json_encode(["success" => $successCount, "errors" => $errorCount]);
} else {
    echo json_encode(["error" => "No data received"]);
}
?>
