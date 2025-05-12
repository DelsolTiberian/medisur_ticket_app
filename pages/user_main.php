<?php
    session_start();
    include "../php_assets/database_command.php";
    $perm = db_request("SELECT permission FROM role JOIN role_permission ON role.id = role_permission.role WHERE role.id LIKE ? ", [$_SESSION['role']], "../database.sqlite");
    foreach ($perm as $perm_id) {
        $_SESSION['permission'][] = $perm_id['permission'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medisur Users</title>
    <link rel="stylesheet" href="../style/main.css">
    <script type="module" src="../js/main.js" defer></script>
    <!-- Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include("../php_assets/top_bar.php");
    ?>
    <div class="center main-container">
        <div class="center left-container">
            <h1>Tickets</h1>
            <div class="convenient-btn mobile-only">
                <button id="sort-btn"> Trier </button>
                <button id="filter-btn"> Filtrer </button>
            </div>
            <div class="ticket-list">
                <?php
                    include "../php_assets/ticket.php";
                    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
                        $tickets = db_request("SELECT amount, creation_datetime, description, receipt, asking_user, first_name, last_name, expense_category.name AS exp_cat_name, status  FROM expense JOIN user ON expense.asking_user = user.id JOIN expense_category ON expense.category = expense_category.id ;", [], "../database.sqlite");
                    } else {
                        $tickets = db_request("SELECT amount, creation_datetime, description, receipt, asking_user, first_name, last_name, expense_category.name AS exp_cat_name, status  FROM expense JOIN user ON expense.asking_user = user.id JOIN expense_category ON expense.category = expense_category.id WHERE asking_user = ? ;", [$_SESSION['identifier']], "../database.sqlite");
                    }
                    $ticket_list = [];
                    foreach ($tickets as $ticket) {
                        $ticket_list[] = new Ticket($ticket);
                        end($ticket_list)->display();
                    }
                ?>
            </div>

            <div class="action-div-btn mobile-only">

            </div>
        </div>
        <div class="center desktop-only" >
        </div>

    </div>

</body>
</html>
