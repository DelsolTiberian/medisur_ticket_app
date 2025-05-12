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
        error_reporting(0);
        include("../php_assets/top_bar.php");
    ?>
    <div class="log-user center">
        <h1>Nouveau Ticket</h1>
        <?php
        $flags = [
            'userlist' => true,
            'typedepense' => true,
            'montant' => true,
            'description' => true,
            'justif' => true,
            'validation' => true,
            'anullation' => true,
        ];

        include '../php_assets/form.php';
        Form($flags);
        ?>

    </div>
</body>
</html>
