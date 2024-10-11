<?php
require_once '../../connection.php';

$username = $_POST['username']; // School ID for username
$pass = $_POST['pass']; // Email for password

session_start(); // Start session at the beginning

// Check if the user is an admin
$adminQuery = $conn->prepare("SELECT COUNT(admin_id) AS cnt, admin_id, username, `password`, firstname, middlename, lastname, suffixname, school_id
                              FROM tbladmin 
                              WHERE username = ? AND `password` = ?");
$adminQuery->execute([$username, $pass]);
$adminResult = $adminQuery->fetch();

// Check if the user is a student
$studentQuery = $conn->prepare("SELECT COUNT(student_id) AS cnt, student_id, firstname, middlename, lastname, suffixname 
                                FROM tblstudent 
                                WHERE student_id = ? AND email = ?");
$studentQuery->execute([$username, $pass]);
$studentResult = $studentQuery->fetch();

if ($adminResult['cnt'] > 0) {
    // Admin login successful
    $adminMiddleInitial = $adminResult['middlename'] ? substr($adminResult['middlename'], 0, 1) . '.' : ''; // Extract middle initial
    $_SESSION['admin_id'] = $adminResult['admin_id'];
    $_SESSION['user_role'] = 'admin'; // Set a role for the user
    $_SESSION['user_name'] = "{$adminResult['firstname']} {$adminMiddleInitial} {$adminResult['lastname']} {$adminResult['suffixname']}"; // Firstname MiddleInitial Lastname Suffixname
    $_SESSION['school_id'] = $adminResult['school_id'];
    echo json_encode(['status' => 'success', 'role' => 'admin']);
} elseif ($studentResult['cnt'] > 0) {
    // Student login successful
    $studentMiddleInitial = $studentResult['middlename'] ? substr($studentResult['middlename'], 0, 1) . '.' : ''; // Extract middle initial
    $_SESSION['student_id'] = $studentResult['student_id'];
    $_SESSION['user_role'] = 'student'; // Set a role for the user
    $_SESSION['user_name'] = "{$studentResult['lastname']}, {$studentResult['firstname']} {$studentMiddleInitial} {$studentResult['suffixname']}"; // Lastname, Firstname MiddleInitial Suffixname
    echo json_encode(['status' => 'success', 'role' => 'student']);
} else {
    // Login failed
    echo json_encode(['status' => 'error', 'message' => 'Invalid username/password']);
}
?>
