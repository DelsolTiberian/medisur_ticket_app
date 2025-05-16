<?php
session_start();
include "../php_assets/database_command.php";
$perm = db_request("SELECT permission FROM role JOIN role_permission ON role.id = role_permission.role WHERE role.id LIKE ? ", [$_SESSION['role']], "../database.sqlite");
$_SESSION['permission'] = [];
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
    <div class="left-container center">
        <h1>Tickets</h1>
        <div class="convenient-btn mobile-only">
            <button id="sort-btn"> Trier </button>
            <button id="filter-btn"> Filtrer </button>
        </div>
        <div class="ticket-list">
            <?php
            include "../php_assets/ticket.php";
            if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
                $tickets = db_request("SELECT expense.id, amount, creation_datetime, description, receipt, asking_user, first_name, last_name, expense_category.name AS exp_cat_name, status  FROM expense JOIN user ON expense.asking_user = user.id JOIN expense_category ON expense.category = expense_category.id ;", [], "../database.sqlite");
            } else {
                $tickets = db_request("SELECT expense.id, amount, creation_datetime, description, receipt, asking_user, first_name, last_name, expense_category.name AS exp_cat_name, status  FROM expense JOIN user ON expense.asking_user = user.id JOIN expense_category ON expense.category = expense_category.id WHERE asking_user = ? ;", [$_SESSION['identifier']], "../database.sqlite");
            }
            $ticket_list = [];
            foreach ($tickets as $ticket) {
                $ticket_list[] = new Ticket($ticket);
                end($ticket_list)->display();
            }
            ?>
        </div>

        <div class="btn-container mobile-only">
            <?php
            if (in_array(1, $_SESSION['permission']) ) {
                echo '<button class="other-side-btn manage-user-btn"> <img src="../assets/del-user.png"> </button>
                     <button class="other-side-btn new-user-btn"> <img src="../assets/new-user.png"> </button>
                ';
            }
            if (in_array(2, $_SESSION['permission']) ) {
                echo '<button class="side-btn edit-ticket-btn"> <img src="../assets/edit-ticket-btn.png"> </button>';
                echo '<button class="new-ticket-btn"> <img src="../assets/new-ticket-btn.png"> </button>';
                echo '<button class="side-btn delete-ticket-btn"> <img src="../assets/delete-ticket-btn.png"> </button>';
            }
            if (in_array(3, $_SESSION['permission']) && $_SESSION['role'] == 1) {
                echo ' <button class="other-side-btn validate-btn"> <img src="../assets/validate.png"> </button>';
                echo '<button  class="other-side-btn refuse-btn"> <img src="../assets/cancel.png"> </button> ';
            } elseif (in_array(3, $_SESSION['permission'])) {
                echo '<div class="btn-container"> <button  class="other-side-btn big-btn validate-btn"> <img src="../assets/validate.png"> </button>';
                echo '<button class="other-side-btn big-btn refuse-btn"> <img src="../assets/cancel.png"> </button> </div>';
            }
            ?>
        </div>
        <div class="btn-container desktop-only">
            <div class="align-left">
                <button >Filtrer</button>
                <button >Trier</button>
            </div>
            <?php
            if (in_array(1, $_SESSION['permission']) ) {
                echo "<div class='align-right'>
                    <button class='manage-user-btn'>Suppr. Utilisateur</button>
                    <button class='new-user-btn' >Nouv. Utilisateur</button>
                </div>";
            }
            if (in_array(2, $_SESSION['permission']) ) {
                echo "<div class='align-left'>
                    <button class='new-ticket-btn'>Nouveau</button>
                    <button class='edit-ticket-btn'>Editer</button>
                    <button class='delete-ticket-btn'>Suppr.</button>
                </div>";
            }
            if (in_array(3, $_SESSION['permission'])) {
                echo "<div class='align-right'>
                    <button class='validate-btn'>Valider</button>
                    <button class='refuse-btn'>Refuser</button>
                </div>";
            }
            ?>
        </div>
    </div>
    <div class="center right-container desktop-only" >
    </div>

</div>

</body>
</html>