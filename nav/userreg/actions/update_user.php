<?php 
require_once '../../../connection.php';

$admin_id = $_POST['admin_id'];
$school_id = $_POST['school_id'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

try {
    $conn->beginTransaction();

    if (!empty($password)) {
        // Do not hash the password, use it as it is
        $updateQry = $conn->prepare("UPDATE tbladmin SET school_id = ?, firstname = ?, middlename = ?, lastname = ?, email = ?, username = ?, password = ?, role = ? WHERE admin_id = ?");
        $updateQry->execute([$school_id, $firstname, $middlename, $lastname, $email, $username, $password, $role, $admin_id]);
    } else {
        $updateQry = $conn->prepare("UPDATE tbladmin SET school_id = ?, firstname = ?, middlename = ?, lastname = ?, email = ?, username = ?, role = ? WHERE admin_id = ?");
        $updateQry->execute([$school_id, $firstname, $middlename, $lastname, $email, $username, $role, $admin_id]);
    }
    
    echo 'succces';
    $conn->commit();
} catch (\Throwable $th) {
    $conn->rollBack();
    echo $th;
}
?>
