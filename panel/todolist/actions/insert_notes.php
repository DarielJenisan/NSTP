<?php
require_once '../../../connection.php';
$title = $_POST['title'];


try {
    $conn->beginTransaction();
    
    $selNotesList = $conn->prepare("INSERT INTO `tblnotes`(`tilte`) VALUES (?)");
    $selNotesList->execute([$title]);

    $conn->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $conn->rollBack(); //undo
}
?>