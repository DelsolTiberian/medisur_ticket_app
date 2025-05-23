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
        ini_set('display_errors', 0);
        include("../php_assets/top_bar.php");
    ?>
    <div class="log-user center">
        <h1>Nouvel Utilisateur</h1>
        <?php
        $firstName = $lastName = $email = $password = $role_id = $profilePicturePath = '';
        $flags = [
            'prenom' => true,
            'nom' => true,
            'password' => true,
            'email' => true,
            'role' => true,
            'pfp' => true,
            'validation' => true,
            'anullation' => true,
        ];

        include '../php_assets/form.php';
        Form($flags);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            include '../php_assets/database_command.php';

            $firstName = trim($_POST['first-name'] ?? '');
            $lastName = trim($_POST['last_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role_id = $_POST['role'] ?? '';

            $errors = [];

            // Validation
            if (empty($firstName)) $errors[] = "Le prénom est requis.";
            if (empty($lastName)) $errors[] = "Le nom est requis.";
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
            if (empty($password)) $errors[] = "Le mot de passe est requis.";
            if ($role_id === '') $errors[] = "Le rôle est requis.";

            if (empty($errors)) {
                $filename = strtolower($firstName . '_' . $lastName);
                $uploadDir = '../assets/users_photo/';
                $extension = pathinfo($_FILES['prouf']['name'], PATHINFO_EXTENSION);
                $uploadPath = $uploadDir . $filename . '.' . $extension;

                // Handle image upload
                if (isset($_FILES['prouf']) && $_FILES['prouf']['error'] === UPLOAD_ERR_OK) {
                    $tmpFile = $_FILES['prouf']['tmp_name'];
                    $originalName = $_FILES['prouf']['name'];
                    $fileType = mime_content_type($tmpFile);
                    $allowedTypes = ['image/png', 'image/jpeg'];

                    if (in_array($fileType, $allowedTypes)) {
                        $mimeToExt = [
                            'image/png' => 'png',
                            'image/jpeg' => 'jpg',
                        ];

                        $extension = $mimeToExt[$fileType] ?? '';

                        if ($extension === '') {
                            echo "❌ Type de fichier non autorisé.";
                            return;
                        }

                        $uuid = uniqid('', true);
                        $newFileName = $uuid . '.' . $extension;

                        $uploadPath = $newFileName;

                        if (!move_uploaded_file($tmpFile, $uploadPath)) {
                            echo "❌ Échec de l'enregistrement du fichier.";
                            return;
                        }

                        $profilePicturePath = $uploadPath;

                    } else {
                        echo "❌ Type de fichier non autorisé (seulement PNG ou JPEG).";
                        return;
                    }
                } else {
                    echo "❌ Aucun fichier image fourni ou erreur lors de l'upload.";
                    return;
                }


                // Now insert into DB
                try {
                    $sql = "INSERT INTO user (first_name, last_name, email, password, role, profile_picture_url) VALUES (?, ?, ?, ?, ?, ?)";

                    $params = [
                        $firstName,
                        $lastName,
                        $email,
                        password_hash($password, PASSWORD_BCRYPT),
                        $role_id,
                        $profilePicturePath
                    ];

                    db_request_ticket($sql, $params, '../database.sqlite');

                    header("Location: new_user.php?success=1");
                    exit();

                } catch (Exception $e) {
                    echo "❌ Erreur : " . $e->getMessage();
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
 