<?php
require_once '../../../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminId = $_POST['admin_id'];
    $isActive = $_POST['is_active'];

    // Update the admin's active status in the database
    $stmt = $conn->prepare("UPDATE tbladmin SET is_active = ? WHERE admin_id = ?");
    $stmt->execute([$isActive, $adminId]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Admin status updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update admin status.']);
    }
}
?>
