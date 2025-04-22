<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medisur Users</title>
    <link rel="stylesheet" href="../style/main.css">
    <!-- Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../php_assets/top_bar.php");
    ?>
    <div class="log-user center">
        <h1>Nouvel Utilisateur</h1>
        <form class="center" action="index.php" method="post">
            <input class="log-input log-user-input" type="text" placeholder="Nom" name="first-name"/>
            <input class="log-input log-user-input" type="text" placeholder="Prénom" name="last_name"/>
            <input class="log-input log-user-input" type="password" placeholder="Mot De Passe" name="password"/>
            <select class="log-input log-user-input" name="role">
                <option>Choisir une rôle</option>
                <option value="admin">Admin</option>
                <option value="user">Commercial</option>
                <option value="user">Comptable</option>
            </select>
            <label for="prouf"> Importer Justificatif </label>
            <input type="file" name="prouf" id="prouf" accept="application/pdf, image/png, image/jpeg" style="display: none"/>

            <div>
                <input type="submit"/>
                <a onclick="" style="margin-left: 2vh;margin-bottom: 6vh; margin-right: -8vh; background: transparent; border: transparent">
                    <svg width="6vh" height="6vh" viewBox="0 0 270 270" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M94 94L176 176M176 94L94 176M39.3333 12H230.667C245.762 12 258 24.2375 258 39.3333V230.667C258 245.762 245.762 258 230.667 258H39.3333C24.2375 258 12 245.762 12 230.667V39.3333C12 24.2375 24.2375 12 39.3333 12Z" stroke="black" stroke-width="24" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </form>
        
    </div>
</body>
</html>
