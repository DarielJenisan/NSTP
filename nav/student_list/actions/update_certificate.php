<?php
// Database connection
include('../../../connection.php'); // Modify this with your actual database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $coordinator = $_POST['coordinator'];
    $daterelease = $_POST['daterelease'];

    // Validate inputs
    if (!empty($student_id) && !empty($coordinator)) {
        // Check database connection
        if ($conn->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
            exit();
        }

        // Update the certificate details
        $query = "UPDATE tblcertificate SET coordinator = ?, daterelease = ? WHERE student_id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Database preparation failed: ' . $conn->error]);
            exit();
        }

        $stmt->bind_param('ssi', $coordinator, $daterelease, $student_id);

        // Debugging: Log the values being updated
        error_log("Updating student_id: $student_id, coordinator: $coordinator, daterelease: $daterelease");

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database update failed: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    }
}
?>
