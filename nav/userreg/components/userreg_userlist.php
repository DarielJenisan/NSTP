<?php 
require_once '../../../connection.php';

// Fetch user data from the database
$selUser = $conn->query("SELECT * FROM tbladmin ORDER BY admin_id");
$admins = $selUser->fetchAll();

foreach ($admins as $row): ?>
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
        <td class="text-center">
            <button class="btn btn-toggle" 
                onclick="toggleActive(this, <?php echo $row['admin_id']; ?>)"
                data-status="<?php echo $row['is_active'] ? 'active' : 'inactive'; ?>"
                style="background-color: <?php echo $row['is_active'] ? 'green' : 'red'; ?>; color: white;">
                <?php echo $row['is_active'] ? 'Active' : 'Inactive'; ?>
            </button>
        </td>
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
<?php endforeach; ?>
