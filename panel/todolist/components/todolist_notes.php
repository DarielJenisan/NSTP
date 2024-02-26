<?php
require_once '../../../connection.php';

$selNotes = $conn->prepare("SELECT notesId,tilte, dateCreated from tblnotes order by notesId Desc");
$selNotes->execute();
?>

<?php foreach ($selNotes->fetchAll() as $row) : //all rows kuahon ?>
    <tr class="border-bottom cursor-pointer alltrnotes" onclick="loadtodolist_list(<?php echo $row['notesId'] ?>, this)">
        <td class="text-center pt-3"><?php echo $row['tilte'] ?></td>
        <td class="text-center pt-3"><?php echo $row['dateCreated'] ?></td>
        <td class="text-center pt-3" onclick="loadmodal_input(<?php echo $row['notesId'] ?>,'edit')"><i class="fa-solid fa-pen"></i></td>
        <td class="text-center pt-3 text-danger" onclick="deleteNotes(<?php echo $row['notesId'] ?>)"><i class="fa-solid fa-trash"></i></td>
    </tr>
<?php endforeach; ?>