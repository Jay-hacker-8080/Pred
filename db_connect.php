<?php
$host = 'localhost';
$dbname = 'kinglzrs_god';
$username = 'kinglzrs_god';  // Replace with your MySQL username
$password = '123qweas@PP';  // Replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>