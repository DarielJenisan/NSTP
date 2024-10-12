<?php
// Include your database connection
require_once '../../../connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted slip data
    $slipData = json_decode($_POST['slipData'], true); // Decode the JSON data
    $type = $_POST['type']; // Get slip type (cwts or rotc)

    // Here you can perform any database operations if needed
    // For example, inserting the data into a database table

    // Return the slip data as JSON response
    echo json_encode(['success' => true, 'data' => $slipData, 'type' => $type]);
    exit;
}
?>
