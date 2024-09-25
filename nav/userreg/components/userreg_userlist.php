<?php 
require_once '../../../connection.php';

$selUser = $conn->query("SELECT * from tbladmin order by admin_id")
?>

<?php foreach ($selUser->fetchAll() as $row): ?>
    <tr>
        <td><?php echo $row['admin_id']?></td>
        <td><?php echo $row['school_id']?></td>
        <td><?php echo $row['lastname']?></td>
        <td><?php echo $row['firstname']?></td>
        <td><?php echo $row['middlename']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['password']?></td>
        <td><?php echo $row['role']?></td>
        <td><?php echo $row['created_at']?></td>
        <td class="text-center"><i class="fa fa-trash text-danger cursor-pointer" onclick="modal_confirm('deleteuser(<?php echo $row['admin_id']?>)','','Are you sure you want to delete this user?')"></i></td>
        <td class="text-center">
    <i class="fa fa-edit text-success cursor-pointer" 
        onclick="loadUserData(
            '<?php echo $row['admin_id'] ?>',
            '<?php echo $row['school_id'] ?>',
            '<?php echo $row['firstname'] ?>',
            '<?php echo $row['middlename'] ?>',
            '<?php echo $row['lastname'] ?>',
            '<?php echo $row['email'] ?>',
            '<?php echo $row['role'] ?>',
            '<?php echo $row['username'] ?>'
        )"></i>
</td>
    </tr>
<?php endforeach;?>