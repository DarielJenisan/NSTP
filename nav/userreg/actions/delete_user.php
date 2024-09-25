<?php 
require_once '../../../connection.php';
$yyyyyyy = $_POST['xxxx'];

try {
    $conn->beginTransaction();

    $deleteQry = $conn->prepare("DELETE FROM tbladmin WHERE admin_id = ?");
    $deleteQry->execute([$yyyyyyy]);
    
    echo 'succces';
    $conn->commit();
} catch (\Throwable $th) {
    $conn->rollBack();
    echo $th;
}
?>
