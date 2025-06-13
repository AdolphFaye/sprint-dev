<?php
session_start();
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $mdp = $_POST['mot_de_passe'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($mdp, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['is_admin'] = $user['is_admin'];
        header("Location: home.php");
        exit();
    } else {
        echo "Identifiants incorrects";
    }
}
?>

<!-- Formulaire de connexion -->
<form method="post">
  <input name="email" required type="email" placeholder="Email">
  <input name="mot_de_passe" required type="password" placeholder="Mot de passe">
  <button type="submit">Se connecter</button>
</form>