<?php
require_once '../../../connection.php';
$title = $_POST['title'];
$noteid = $_POST['noteid'];


try {
    $conn->beginTransaction();
    
    $updateQry = $conn->prepare("UPDATE tblnotes SET tilte=? WHERE notesId=?");
    $updateQry->execute([$title, $noteid ]);

    $conn->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $conn->rollBack(); //undo
}
?>