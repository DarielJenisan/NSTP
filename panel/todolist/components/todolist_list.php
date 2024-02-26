<?php
require_once '../../../connection.php';

$notesId = $_POST['notesId'];

$selNotesList = $conn->prepare("SELECT * from tblnote_list where notesId = ?");
$selNotesList->execute([$notesId]);

?>
<div class="row g-0 p-4 px-2 pt-3 h-100">
    <div class="card ">
        <div class="card-body">
            <?php foreach ($selNotesList->fetchAll() as $row) : ?>
               <p><?php echo $row['list']?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div style="height: 150px;"></div>