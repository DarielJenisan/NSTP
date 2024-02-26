<?php
require_once '../../../connection.php';

$inputtype = $_POST['inputtype'];

$title = '';
$id = '';


if ($inputtype == 'edit') {
    $id = $_POST['id'];
    $selNotes = $conn->prepare("SELECT tilte from tblnotes where notesId = ?");
    $selNotes->execute([$id]);
    $selNotes = $selNotes->fetch(); // one row nga data kuhaon

    $title = $selNotes['tilte'];
}
?>


<div class="modal-header">
    <h5 class="modal-title"><?php echo $inputtype == 'add' ? 'Add Notes' : 'Update Notes' ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="frminertnotes" noteid="<?php echo $id ?>" inputtype="<?php echo $inputtype ?>">
        <input id="wewinputtext_title" class="form-control form-control-sm" type="text" required value="<?php echo $title ?>">
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" form="frminertnotes" class="btn btn-primary"><?php echo $inputtype == 'add' ? 'Save' : 'Update' ?> changes</button>
</div>
<script>
    $('#frminertnotes').submit(function(e) {
        e.preventDefault();
        insertOrUpdateNotes();
    });
</script>