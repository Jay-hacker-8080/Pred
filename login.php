<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $license_key = $_POST['license_key'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE license_key = :license_key AND expire_date >= CURDATE()");
    $stmt->execute(['license_key' => $license_key]);
    $user = $stmt->fetch();

    if ($user) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>