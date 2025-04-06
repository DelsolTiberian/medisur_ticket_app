<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medisur Tickets</title>
    <link rel="stylesheet" href="style/main.css">
    <!-- Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="medisur-gradient center">
    <div class="log-bg center">
        <h1> Log-In</h1>
        <form class="center" action="index.php" method="post">
            <input class="log-input" type="text" placeholder="Identifiant" name="user_id"/>
            <input class="log-input" type="password" placeholder="Mot De Passe" name="password"/>
            <input class="submit" type="submit" value="Connexion" />

            <?php
                // Include important sql requesting functiuns
                include 'php_assets/database_command.php';

                $identifier = explode("_", $_POST['user_id']) ?? NULL; //user's identifer is composed with user's lastname + "_" +  user's firstname
                $password = $_POST['password'] ?? NULL;
                if(isset($identifier) && isset($password)){
                    // Ask if user exist and what is his role
                    $user = db_select("SELECT role.name, user.id, user.profile_picture_url FROM user JOIN role ON user.role = role.id WHERE user.last_name LIKE '$identifier[0]' AND user.first_name LIKE '$identifier[1]' AND password LIKE '$password';") ?? NULL;
                    $_SESSION["role"] = $user['name'];
                    // If the user exist: redirect on his home page
                    if (isset($_SESSION["role"])){
                        $_SESSION["user_id"] = $user['id']; // Only unic identifier that is independant of his first and last names
                        $_SESSION["user_photo"] = $user['profile_picture_url'] ?? NULL;
                        header("Location: ./pages/user_main.php");
                    }
                }
            ?>

        </form>
    </div>
</body>
</html>