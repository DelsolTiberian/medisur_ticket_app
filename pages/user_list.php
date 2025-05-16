<?php
session_start();

include '../php_assets/user.php';

$user1 = new Users(null, "Dupont", "Jean", "123", "Développeur", "jean.dupont@example.com", "1234", "Admin");
$user2 = new Users(null, "Clair", "Obscure", "33", "Designer", "claire.obscure@example.com", "abcd", "Admin");
$user3 = new Users(null, "Lionel", "Messi", "789", "Chef de projet", "lionel.messi@example.com", "efgh", "Admin");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Utilisateurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/user.css">
</head>
<body>

<?php include '../php_assets/top_bar.php'; ?>

<h2 class="titre-page">Utilisateurs</h2>

<div class="controls">
    <button>Trier</button>
    <button>Filtrer</button>
</div>

<div class="container">
    <?= $user1->display(); ?>
</div>

<div class="user-preview" onclick="toggleUser(this, 'second-user')">
    <img src='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/person-circle.svg' alt='Icon' width='24' height='24' />
    <p><strong><?= $user2->getNom(); ?> <?= $user2->getPrenom(); ?></strong> - <?= $user2->getPoste(); ?></p>
</div>

<div class="container" id="second-user">
    <?php echo $user2->display(); ?>
</div>

<div class="user-preview" onclick="toggleUser(this, 'third-user')">
    <img src='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/person-circle.svg' alt='Icon' width='24' height='24' />
    <p><strong><?= $user3->getNom(); ?> <?= $user3->getPrenom(); ?></strong> - <?= $user3->getPoste(); ?></p>
</div>

<div class="container" id="third-user">
    <?php echo $user3->display(); ?>
</div>

<div class="user-actions">
    <button class="icon-btn">
        <img src="../assets/edit.svg" alt="Modifier" class="icon-img" />
        <span>Modifier</span>
    </button>
    <button class="icon-btn">
        <img src="../assets/supprimer.svg" alt="Supprimer" class="icon-img" />
        <span>Supprimer</span>
    </button>
</div>

<script src="../js/user.js"></script>
</body>
</html>
