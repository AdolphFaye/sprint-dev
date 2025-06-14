<?php

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
  $mdp = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $mdp]);
    header("Location: login.php");
    exit();
}
?>
<?php include 'header.php'; ?>
<div class="container mt-5">
  <h2>Inscription</h2>
  <form method="post">
    <input name="nom" class="form-control mb-2" placeholder="Nom" required>
    <input name="prenom" class="form-control mb-2" placeholder="Prénom" required>
    <input name="email" class="form-control mb-2" type="email" placeholder="Email" required>
    <input name="mot_de_passe" class="form-control mb-2" type="password" placeholder="Mot de passe" required>
    <button class="btn btn-success">S'inscrire</button>
  </form>
</div>