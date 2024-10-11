<?php
session_start();
require_once '../../connection.php';

// Initialize a response array
$response = ['status' => 'error', 'message' => 'User not logged in'];

// Check user role and fetch details accordingly
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin' && isset($_SESSION['admin_id'])) {
        // Admin user
        $response = [
            'status' => 'success',
            'role' => 'admin',
            'name' => $_SESSION['user_name'], // Get full name (Firstname Middlename Lastname Suffixname)
            'schoolId' => $_SESSION['school_id']
        ];
    } elseif ($_SESSION['user_role'] === 'student' && isset($_SESSION['student_id'])) {
        // Student user
        $response = [
            'status' => 'success',
            'role' => 'student',
            'name' => $_SESSION['user_name'], // Get full name (Lastname, Firstname Middlename Suffixname)
            'schoolId' => $_SESSION['student_id']
        ];
    }
}

// Output the JSON response
echo json_encode($response);
?>
