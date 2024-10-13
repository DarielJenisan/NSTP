<?php 
require_once '../../../connection.php';

// Get POST data
$admin_id = $_POST['admin_id'];
$school_id = $_POST['school_id'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password']; // No hashing applied here
$role = $_POST['role'];

try {
    $conn->beginTransaction();

    // Check if password is provided
    if (!empty($password)) {
        // No password hashing, store it as it is
        $updateQry = $conn->prepare("UPDATE tbladmin SET school_id = ?, firstname = ?, middlename = ?, lastname = ?, email = ?, username = ?, password = ?, role = ? WHERE admin_id = ?");
        $updateQry->execute([$school_id, $firstname, $middlename, $lastname, $email, $username, $password, $role, $admin_id]);
    } else {
        // If password is not provided, just update other fields
        $updateQry = $conn->prepare("UPDATE tbladmin SET school_id = ?, firstname = ?, middlename = ?, lastname = ?, email = ?, username = ?, role = ? WHERE admin_id = ?");
        $updateQry->execute([$school_id, $firstname, $middlename, $lastname, $email, $username, $role, $admin_id]);
    }

    // Check if the update was successful
    if ($updateQry->rowCount() > 0) {
        echo 'success'; // Return success message
    } else {
        echo 'No changes made or error occurred'; // Optional detailed message
    }

    $conn->commit();
} catch (\Throwable $th) {
    $conn->rollBack();
    echo 'Error: ' . $th->getMessage(); // Output the error message for debugging
}
?>
