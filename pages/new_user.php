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
    <div class="log-user center" style = "margin-top: 8vh;">
        <h1 style="text-align: center; font-size: 30px;">Nouvel Utilisateur</h1>
        <form class="center" action="index.php" method="post">
            <input class="log-input log-user-input" type="text" placeholder="Nom" name="id"/>
            <input class="log-input log-user-input" type="text" placeholder="Prénom" name="id"/>
            <input class="log-input log-user-input" type="password" placeholder="Mot De Passe" name="password"/>
            <select class="log-input log-user-input" name="role">
                <option>Choisir une rôle</option>
                <option value="admin">Admin</option>
                <option value="user">Commercial</option>
                <option value="user">Comptable</option>
            </select>
            <label for="prouf"> Importer Justificatif </label>
            <input type="file" name="prouf" id="prouf" accept="application/pdf, image/png, image/jpeg" style="display: none">
        </form>
        
    </div>






    <footer>
        <button onclick="" style="margin-right: 2vh;margin-bottom: 6vh; margin-left: -8vh; background: transparent; border: transparent">
            <svg width="6vh" height="6vh" viewBox="0 0 286 270" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M94.7368 121.333L136.105 162.333L274 25.6667M260.211 135V230.667C260.211 237.916 257.305 244.868 252.133 249.994C246.961 255.12 239.946 258 232.632 258H39.5789C32.2646 258 25.2497 255.12 20.0777 249.994C14.9056 244.868 12 237.916 12 230.667V39.3333C12 32.0841 14.9056 25.1317 20.0777 20.0057C25.2497 14.8798 32.2646 12 39.5789 12H191.263" stroke="black" stroke-width="24" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p style="font-size: 3vh">Valider</p>
        </button>
        <button onclick="" style="margin-left: 2vh;margin-bottom: 6vh; margin-right: -8vh; background: transparent; border: transparent">
            <svg width="6vh" height="6vh" viewBox="0 0 270 270" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M94 94L176 176M176 94L94 176M39.3333 12H230.667C245.762 12 258 24.2375 258 39.3333V230.667C258 245.762 245.762 258 230.667 258H39.3333C24.2375 258 12 245.762 12 230.667V39.3333C12 24.2375 24.2375 12 39.3333 12Z" stroke="black" stroke-width="24" stroke-linecap="round" stroke-linejoin="round"/>
                <p style="font-size: 3vh">Refuser</p>
            </svg>
        </button>
    </footer>



</body>
</html>
