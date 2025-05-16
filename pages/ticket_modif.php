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
        <h1>Modify</h1>
        <?php
        $flags = [
            'typedepense' => true,
            'montant' => true,
            'description' => true,
            'justif' => true,
            'validation' => true,
            'anullation' => true,
        ];
        if ($_SESSION['identifier'] == 1) {
            $flags = [
            'userlist' => true,
            'typedepense' => true,
            'montant' => true,
            'description' => true,
            'justif' => true,
            'validation' => true,
            'anullation' => true,
        ];
        }

        include '../php_assets/form.php';
        Form($flags);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            include '../php_assets/database_command.php';

            $typedepense = trim($_POST['typeDep'] ?? '');
            $montant = trim($_POST['montant'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $asking_user = trim($_SESSION['identifier'] ?? '');
            if ($_SESSION['identifier'] == 1) {
                $asking_user = trim($_POST['userlist'] ?? '');
            }
            $status = trim(1) ?? '';

            if (empty($typedepense)) $errors[] = "Donnez le type de dépense.";
            if (empty($montant)) $errors[] = "Mettre un montant.";
            if (empty($description)) $errors[] = "Description du ticket obligatoire.";

            if (empty($errors)) {
                $uploadDir = '../assets/form_receipt/';


                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                if (isset($_FILES['prouf']) && $_FILES['prouf']['error'] === UPLOAD_ERR_OK) {
                    $tmpFile = $_FILES['prouf']['tmp_name'];
                    $originalName = $_FILES['prouf']['name'];
                    $fileType = mime_content_type($tmpFile);


                    $allowedTypes = ['image/png', 'image/jpeg', 'application/pdf'];

                    if (in_array($fileType, $allowedTypes)) {
                        $mimeToExt = [
                            'image/png' => 'png',
                            'image/jpeg' => 'jpg',
                            'application/pdf' => 'pdf'
                        ];

                        $extension = $mimeToExt[$fileType] ?? '';


                        $uuid = uniqid('', true);
                        $newFileName = $uuid . '.' . $extension;

                        $uploadPath = $uploadDir . $newFileName;

                        if (!move_uploaded_file($tmpFile, $uploadPath)) {
                            echo "❌ Échec de l'enregistrement du fichier.";
                            return;
                        }

                        $receiptpath = $uploadPath;

                    } else {
                        echo "❌ Type de fichier non autorisé (seulement PNG, JPEG ou PDF).";
                        return;
                    }
                } else {
                    echo "❌ Aucun fichier fourni ou erreur lors de l'upload.";
                    return;
                }
                try {
                    $created_at = date('d/m/Y'); // ✅ Add timestamp here

                    $sql = "INSERT INTO expense (amount,creation_datetime,category, description, asking_user,status,receipt) VALUES (?, ?, ?, ?, ?, ? , ?)";

                    $params = [
                        $montant,
                        $created_at,
                        $typedepense,
                        $description,
                        $asking_user,
                        $status,
                        $receiptpath
                    ];

                    db_request($sql, $params, '../database.sqlite');

                    header("Location: ../pages/new_tickets.php");
                    exit();


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
