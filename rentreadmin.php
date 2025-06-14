<?php
require 'db.php';
session_start();

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("UPDATE users SET is_admin = 1 WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: users.php');
