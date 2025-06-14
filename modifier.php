<?php
require 'db.php';

$pdo->prepare("UPDATE users SET nom = ?, prenom = ? WHERE id = ?")
    ->execute([$_POST['nom'], $_POST['prenom'], $_POST['id']]);
header("Location: users.php");
exit();
?>