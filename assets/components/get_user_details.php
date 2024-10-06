<?php
require_once '../../connection.php';
session_start();

// Check if an admin is logged in
if (isset($_SESSION['admin_id'])) {
    // Fetch admin details
    $query = $conn->prepare("SELECT firstname, lastname, middlename, school_id FROM tbladmin WHERE admin_id = ?");
    $query->execute([$_SESSION['admin_id']]);
    $admin = $query->fetch();

    if ($admin) {
        echo json_encode([
            'name' => $admin['firstname'] . ' ' . $admin['middlename'] . ' ' . $admin['lastname'], 
            'schoolId' => $admin['school_id'],
            'role' => 'admin'
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Admin not found']);
    }
} 
// Check if a student is logged in
elseif (isset($_SESSION['student_id'])) {
    // Fetch student details
    $query = $conn->prepare("SELECT firstname, lastname, middlename, student_id FROM tblstudent WHERE student_id = ?");
    $query->execute([$_SESSION['student_id']]);
    $student = $query->fetch();

    if ($student) {
        echo json_encode([
            'name' => $student['lastname'] . ', ' . $student['firstname'] . ' ' . $student['middlename'],
            'schoolId' => $student['student_id'],
            'role' => 'student'
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student not found']);
    }
} 
// No user logged in
else {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
}
?>
