<?php
require 'db.php';
$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$_GET['id']]);
header("Location: users.php");
exit();
?>