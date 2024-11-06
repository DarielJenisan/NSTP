<?php
include 'connection.php'; // Include your database connection

// Function to fetch student slip data
function fetchSlipData($student_id) {
    global $conn; // Use the global connection variable
    $response = [];

    // Prepare and execute SQL query to get student slip data
    $sql = "SELECT student_id, firstname, middlename, lastname, suffixname, 
                   yearlevel, department, 
                   semester1, semester2, 
                   academicyear1, academicyear2 
            FROM studentInformation_view 
            WHERE student_id = :student_id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch the student data
        if ($stmt->rowCount() > 0) {
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = 'No data found for this student ID.';
        }
    } catch (PDOException $e) {
        $response['success'] = false;
        $response['message'] = 'Error fetching data: ' . $e->getMessage();
    }

    return json_encode($response);
}

// Check if student_id is provided via GET or POST
if (isset($_GET['student_id'])) {
    echo fetchSlipData($_GET['student_id']);
} else {
    echo json_encode(['success' => false, 'message' => 'Student ID is required.']);
}
?>
