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
            error_reporting(E_ALL);
            ini_set('display_errors', '1');


            include 'php_assets/database_command.php';
                $id = $_POST['user_id'] ?? NULL;
                $password = $_POST['password'] ?? NULL;
                if(isset($id) && isset($password)){
                    $_SESSION["role"] = db_select("SELECT name FROM user JOIN role ON user.role = role.id WHERE user.last_name = '$id' AND password = '$password';")['name'] ?? NULL;
                    if (isset($_SESSION["role"])){
                        print_r($_SESSION["role"]);
                    }
                }

            ?>

        </form>
    </div>
</body>
</html>
