<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database1 = 'nstp_system'; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$database1;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>