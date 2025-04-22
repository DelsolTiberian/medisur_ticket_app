<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medisur Tickets</title>
    <!-- Imports -->
    <link href="./dist/output.css" rel="stylesheet">
</head>
<body>
    <div class="bg-gradient-to-b from-teal-300 to-cyan-800  min-h-screen flex flex-col justify-center items-center">
        <div class="bg-logIn-bg rounded-3xl shadow-lg p-8 m-1  max-w-11/12 w-96">
            <h1 class="text-4xl text-center font-semibold text-black mb-8">Log-In</h1>
            <form class="space-y-6 flex flex-col items-center" action="index.php" method="post">
                    <input class="w-7/8 px-4 py-2 rounded-xl bg-[#a9bfc0] text-input-txt" id="identifier" name="identifier"
                           type="text" placeholder="Identifiant" required>
                    <input class="w-7/8 px-4 py-2 rounded-xl bg-[#a9bfc0] text-input-txt" id="password" name="password"
                           type="password" placeholder="Mot de passe" required>
                    <button class="w-6/12 bg-main-gray opacity-65 text-white font-bold py-2 px-4 rounded-lg">
                        Connexion
                    </button>
                <?php
                    include './php_assets/database_command.php';
                    $id = $_POST['identifier'] ?? null;

                ?>
            </form>
        </div>
    </div>
</body>
</html>