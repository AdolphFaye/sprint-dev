<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) header("Location: login.php");
$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>
<?php include 'header.php'; ?>
<div class="container mt-5">
  <h2>Gestion des utilisateurs</h2>
  <table class="table">
    <tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Actions</th></tr>
    <?php foreach ($users as $u): ?>
    <tr>
      <td><?= $u['id'] ?></td>
      <td><?= $u['nom'] ?></td>
      <td><?= $u['prenom'] ?></td>
      <td><?= $u['email'] ?></td>
      <td>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $u['id'] ?>">Modifier</button>
        <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $u['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        <?php if (!$u['is_admin']): ?>
          <a class="btn btn-success btn-sm" href="rendreadmin.php?id=<?= $u['id'] ?>">Rendre admin</a>
        <?php endif; ?>
      </td>
    </tr>
    <!-- Modale -->
    <div class="modal fade" id="edit<?= $u['id'] ?>">
      <div class="modal-dialog">
        <form method="post" action="modifier.php">
          <input type="hidden" name="id" value="<?= $u['id'] ?>">
          <div class="modal-content p-3">
            <h5>Modifier utilisateur</h5>
            <input name="nom" value="<?= $u['nom'] ?>" class="form-control mb-2">
            <input name="prenom" value="<?= $u['prenom'] ?>" class="form-control mb-2">
            <button class="btn btn-success">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
    <?php endforeach; ?>
  </table>
</div>
