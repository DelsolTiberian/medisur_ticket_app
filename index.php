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
    <link rel="stylesheet" href="style/main.css?v=<?php echo time(); ?>">
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
            <input class="log-input" type="submit" value="connexion" />

            <?php
                include "./php_assets/database_command.php";
                $identifier = $_POST['user_id'] ?? null;
                $password = $_POST['password'] ?? null;
                // Si les champs sont remplis
                if (!empty($identifier) && !empty($password)) {
                    $expl_id = explode("_", $identifier);
                    // Si c'est le format d'un identifiant valide
                    if (count($expl_id) == 2) {
                        $info = db_request("SELECT user.id, user.password, permission.name, user.profile_picture_url FROM user JOIN role ON user.role = role.id JOIN role_permission ON role.id = role_permission.role JOIN permission ON role_permission.permission = permission.id WHERE user.last_name = ? AND user.first_name = ?", [$expl_id[0], $expl_id[1]]);
                        if (!empty($info) and password_verify($password, $info['password'])) {
                            $_SESSION['identifier'] = $info['id'];
                            $_SESSION['user_photo'] = $info['profile_picture_url'];
                            $_SESSION['permission'] = [];
                            for ($i = 1; $i < count($info); $i++) {
                                $_SESSION['permission'][] = $info[$i];
                            }
                            header("Location: ./pages/user_main.php");
                        }
                    }
                }
            ?>

        </form>
    </div>
</body>
</html>