<?php

require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");
$count = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>
<?php include 'header.php'; ?>
<div class="container mt-5">
  <h2>Bonjour <?= htmlspecialchars($_SESSION['nom']) ?></h2>
  <p>Nombre total d'utilisateurs : <?= $count ?></p>
</div>