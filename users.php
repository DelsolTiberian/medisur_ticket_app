<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medisur Users</title>
    <link rel="stylesheet" href="style/main.css">
    <!-- Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="center">
    <div class="log-user center" style = "margin-top: 8vh;">
        <h1 style="text-align: center; font-size: 30px;">Nouvel Utilisateur</h1>   l
        <form class="center" action="index.php" method="post">
            <input class="log-input log-user-input" type="text" placeholder="Nom" name="id"/>
            <input class="log-input log-user-input" type="text" placeholder="Prénom" name="id"/>
            <input class="log-input log-user-input" type="password" placeholder="Mot De Passe" name="password"/>
            <select class="log-input log-user-input" name="role">
                <option value="admin">Admin</option>
                <option value="user">Commercial</option>
                <option value="user">Comptable</option>
            </select>
            <button class ="log-user-input" style="width: 50%;">Importer une photo</buttonc>
        </form>
        
    </div>
    <footer>
        <button onclick="submit()" style="margin-right: 2vh;margin-bottom: 6vh; margin-left: -8vh; background: transparent; border: transparent">
            <svg width="6vh" height="6vh" viewBox="0 0 389 389" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M145.875 178.292L194.5 226.917L356.583 64.8333M340.375 194.5V307.958C340.375 316.556 336.96 324.801 330.88 330.88C324.801 336.96 316.556 340.375 307.958 340.375H81.0417C72.4442 340.375 64.1989 336.96 58.1196 330.88C52.0403 324.801 48.625 316.556 48.625 307.958V81.0417C48.625 72.4442 52.0403 64.1989 58.1196 58.1196C64.1989 52.0403 72.4442 48.625 81.0417 48.625H259.333" stroke="black" stroke-width="32" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p style="font-size: 3vh">Valider</p>
        </button>
        <button class="log-user-input " style="width:35%;" type="reset" name="reset" value="reset">Annuler</button>
    </footer>
    
</body>
</html>
