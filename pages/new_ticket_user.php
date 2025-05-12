<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medisur Ticket</title>
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
            'typedepense' => true,
            'montant' => true,
            'description' => true,
            'justif' => true,
            'validation' => true,
            'anullation' => true,
        ];

        include '../php_assets/form.php';
        Form($flags);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            include '../php_assets/database_command.php';

            $typedepense = trim($_POST['typeDep'] ?? '');
            $montant = trim($_POST['montant'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $asking_user = trim($_SESSION['identifier'] ?? '');

            $errors = [];

            if (empty($typedepense)) $errors[] = "Donnez le type de dépense.";
            if (empty($montant)) $errors[] = "Mettre un montant.";
            if (empty($description)) $errors[] = "Description du ticket obligatoire.";
            if (empty($asking_user)) $errors[] = "Utilisateur non authentifié.";

            if (empty($errors)) {
                try {
                    $created_at = date('Y-m-d H:i:s'); // ✅ Add timestamp here

                    $sql = "INSERT INTO expense (expense_category, amount, description, created_by, created_at)
                    VALUES (?, ?, ?, ?, ?)";

                    $params = [
                        $typedepense,
                        $montant,
                        $description,
                        $asking_user,
                        $created_at
                    ];

                    db_request($sql, $params, '../database.sqlite');

                    echo "<p style='color:green;'>✅ Ticket ajouté avec succès !</p>";

                } catch (Exception $e) {
                    echo "<p style='color:red;'>❌ Erreur : " . $e->getMessage() . "</p>";
                }
            } else {
                foreach ($errors as $error) {
                    echo "<p style='color:red;'>❌ $error</p>";
                }
            }
        }
        ?>

    </div>
</body>
</html>
