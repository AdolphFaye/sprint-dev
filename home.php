<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT COUNT(*) FROM users");
$count = $stmt->fetchColumn();
?>

<h2>Welcome <?= htmlspecialchars($_SESSION['nom']) ?></h2>
<p>Nombre total d'utilisateurs : <?= $count ?></p>
<a href="logout.php">Déconnexion</a>