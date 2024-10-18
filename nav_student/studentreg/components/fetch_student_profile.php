<?php
// fetch_student_profile.php
require_once '../../../connection.php';
session_start();

// Get the logged-in student's ID
if (!isset($_SESSION['student_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Student not logged in']);
    exit;
}

$student_id = $_SESSION['student_id'];

try {
    // Prepare a query to fetch student details
    $query = $conn->prepare("
        SELECT 
            s.student_id, s.firstname, s.middlename, s.lastname, s.suffixname, s.serialnumber, s.birthday, s.gender,
            s.barangay, s.municipality, s.province, s.department, s.major, s.contactnumber, s.email,
            nstp.semester1, academicyear1, nstp.school1,
           nstp.semester2, academicyear2, nstp.school2
        FROM tblstudent s
        LEFT JOIN tblnstp nstp ON s.student_id = nstp.student_id
        WHERE s.student_id = ?
    ");
    
    // Execute query
    $query->execute([$student_id]);

    // Fetch the student data
    $student = $query->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        echo json_encode([
            'status' => 'success',
            'data' => $student
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student not found']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

?>
