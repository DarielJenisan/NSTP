<?php 
require_once '../../../connection.php';
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

    $insertQry = $conn->prepare("INSERT INTO tbladmin(school_id, firstname, middlename, lastname, email,  username, `password`, `role`) VALUES (?,?,?,?,?,?,?,?)");
    $insertQry->execute([$school_id,  $firstname, $middlename, $lastname, $email, $username, $password,  $role]);
    
    echo 'succces';
    $conn->commit();
} catch (\Throwable $th) {
    $conn->rollBack();
    echo $th;
}
?>
