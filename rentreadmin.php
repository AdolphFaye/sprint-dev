<?php
require 'includes/db.php';
$pdo->prepare("UPDATE users SET is_admin = 1 WHERE id = ?")->execute([$_GET['id']]);
header("Location: users.php");
exit();