<?php
require_once '../../../connection.php';

// Fetch distinct academic years from the database
$query = "SELECT DISTINCT academicyear1 AS year FROM tblnstp UNION SELECT DISTINCT academicyear2 AS year FROM tblnstp";
$stmt = $conn->prepare($query);
$stmt->execute();

$years = $stmt->fetchAll(PDO::FETCH_COLUMN);
echo json_encode($years);
?>
