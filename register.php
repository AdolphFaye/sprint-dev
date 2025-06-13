<?php
session_start();
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $email, $mdp]);

    header("Location: login.php");
    exit();
}
?>

<!-- Formulaire d'inscription -->
<form method="post">
  <input name="nom" required placeholder="Nom">
  <input name="prenom" required placeholder="Prénom">
  <input name="email" required type="email" placeholder="Email">
  <input name="mot_de_passe" required type="password" placeholder="Mot de passe">
  <button type="submit">S'inscrire</button>
</form>