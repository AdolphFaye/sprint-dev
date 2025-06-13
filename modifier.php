<?php
require 'includes/db.php';
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pdo->prepare("UPDATE users SET nom = ?, prenom = ? WHERE id = ?")
    ->execute([$nom, $prenom, $id]);
header("Location: users.php");
exit();