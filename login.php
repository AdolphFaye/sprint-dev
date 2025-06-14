<?php

require 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['is_admin'] = $user['is_admin'];
        header("Location: home.php");
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<?php include 'header.php'; ?>
<div class="container mt-5">
  <h2>Connexion</h2>
  <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
  <form method="post">
    <input name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="mot_de_passe" class="form-control mb-2" placeholder="Mot de passe" required>
    <button class="btn btn-primary">Se connecter</button>
  </form>
  <a href="register.php">Pas encore inscrit ?</a>
</div>