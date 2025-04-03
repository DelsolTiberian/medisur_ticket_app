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
            <input class="log-input" type="text" placeholder="Identifiant" name="id"/>
            <input class="log-input" type="password" placeholder="Mot De Passe" name="password"/>
            <input class="submit" type="submit" value="Connexion" />

            <?php
            const DB_PATH = './database.sqlite';

            function createDatabaseConnection() {
                try {
                    return new PDO("sqlite:" . DB_PATH);
                } catch (PDOException $e) {
                    die("Erreur : " . $e->getMessage());
                }
            }

            $pdo = createDatabaseConnection();


            ?>

        </form>
    </div>
</body>
</html>
