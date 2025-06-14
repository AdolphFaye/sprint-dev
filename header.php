<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-light bg-light px-3">
  <a class="navbar-brand" href="home.php">projet_users</a>
  <div>
    <a class="btn btn-outline-primary" href="home.php">Home</a>
    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
      <a class="btn btn-outline-secondary" href="users.php">Users</a>
    <?php endif; ?>
    <a class="btn btn-outline-danger" href="logout.php">Déconnexion</a>
  </div>
</nav>