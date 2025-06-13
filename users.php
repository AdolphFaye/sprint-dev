<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>

<h2>Gestion des utilisateurs</h2>
<table>
  <tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Actions</th></tr>
  <?php foreach ($users as $u): ?>
  <tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['nom'] ?></td>
    <td><?= $u['prenom'] ?></td>
    <td><?= $u['email'] ?></td>
    <td>
      <button data-bs-toggle="modal" data-bs-target="#edit<?= $u['id'] ?>">Modifier</button>
      <a href="delete_user.php?id=<?= $u['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
      <?php if (!$u['is_admin']): ?>
        <a href="rendre_admin.php?id=<?= $u['id'] ?>">Rendre admin</a>
      <?php endif; ?>
    </td>
  </tr>

  <!-- Modale Bootstrap pour modifier -->
  <div class="modal fade" id="edit<?= $u['id'] ?>">
    <div class="modal-dialog">
      <form method="post" action="modifier_user.php">
        <input type="hidden" name="id" value="<?= $u['id'] ?>">
        <input name="nom" value="<?= $u['nom'] ?>">
        <input name="prenom" value="<?= $u['prenom'] ?>">
        <button type="submit">Enregistrer</button>
      </form>
    </div>
  </div>
  <?php endforeach; ?>
</table>
