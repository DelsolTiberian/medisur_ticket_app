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
    <link href="src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body >
<h1 class="text-3xl font-bold underline">
    Hello world!
</h1>
    <div >
        <h1> Log-In</h1>
        <form action="index.php" method="post">
            <!--suppress HtmlFormInputWithoutLabel -->
            <input class="" type="text" placeholder="Identifiant" name="user_id"/>
            <!--suppress HtmlFormInputWithoutLabel -->
            <input class="" type="password" placeholder="Mot De Passe" name="password"/>
            <input class="" type="submit" value="connexion" />

            <?php
                // Include important sql requesting functiuns
                include 'php_assets/database_command.php';

            ?>

        </form>
    </div>
</body>
</html>