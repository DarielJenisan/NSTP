<?php
require_once '../../connection.php';

$username = $_POST['username']; // School ID for username
$pass = $_POST['pass']; // Email for password

// Check if the user is an admin
$adminQuery = $conn->prepare("SELECT COUNT(admin_id) AS cnt, admin_id, username, `password`
                              FROM tbladmin 
                              WHERE username = ? AND `password` = ?");
$adminQuery->execute([$username, $pass]);
$adminResult = $adminQuery->fetch();

// Check if the user is a student
$studentQuery = $conn->prepare("SELECT COUNT(student_id) AS cnt, student_id, student_id, email 
                                FROM tblstudent 
                                WHERE student_id = ? AND email = ?");
$studentQuery->execute([$username, $pass]);
$studentResult = $studentQuery->fetch();

session_start();

if ($adminResult['cnt'] > 0 && $adminResult['username'] == $username && $adminResult['password'] == $pass) {
    // Admin login successful
    $_SESSION['admin_id'] = $adminResult['admin_id'];
    echo json_encode(['status' => 'success', 'role' => 'admin']);
} elseif ($studentResult['cnt'] > 0 && $studentResult['student_id'] == $username && $studentResult['email'] == $pass) {
    // Student login successful
    $_SESSION['student_id'] = $studentResult['student_id'];
    echo json_encode(['status' => 'success', 'role' => 'student']);
} else {
    // Login failed
    echo json_encode(['status' => 'error', 'message' => 'Invalid username/password']);
}
?>
