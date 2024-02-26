<?php
require_once '../../../connection.php';

$notesId = 100;

// MULTIPLE ROW
$selNotesList = $conn->prepare("SELECT * from tblnotes");
$selNotesList->execute();
foreach ($selNotesList as $row) {
    echo $row['tilte'];
    echo '<br>';
}
echo '<br><br>';

// 1ROW
$sel1 = $conn->prepare("SELECT notesId, tilte from tblnotes where notesId = ?");
$sel1->execute([$notesId]);
$sel1 = $sel1->fetch();
echo $sel1['tilte'];
echo '<br><br>';

// 1ROW COLUMN 1
$selNotesList = $conn->prepare("SELECT notesId, tilte from tblnotes where notesId = ?");
$selNotesList->execute([$notesId]);
echo $selNotesList->fetchColumn(0);

?>