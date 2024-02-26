<?php
require_once '../../../connection.php';
$noteid = $_POST['noteid'];


try {
    $conn->beginTransaction();
    
    $selNotesList = $conn->prepare("DELETE FROM `tblnotes` WHERE notesId=?");
    $selNotesList->execute([$noteid]);

    $conn->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $conn->rollBack(); //undo
}
?>