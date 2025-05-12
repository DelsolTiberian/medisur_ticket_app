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
    include("../php_assets/top_bar.php");
    ?>
    <div class="center main-container">
        <div class="center left-container">
            <h1>Tickets</h1>
            <div class="convenient-btn">
                <button id="sort-btn"> Trier </button>
                <button id="filter-btn"> Filtrer </button>
            </div>
            <div class="ticket-list">
                <?php
                    include "../php_assets/database_command.php";
                    include "../php_assets/ticket.php";
                    $tickets = db_request("SELECT amount, creation_datetime, description, receipt, first_name, last_name, expense_category_name, status  FROM expense JOIN user ON expense.asking_user = user.id JOIN expense_category ON expense.category = expense_category.id ;", [], "../database.sqlite");
                    $ticket_list = [];
                   foreach ($tickets as $ticket) {
                       $test = new Ticket($ticket);
                       $test->display();
                       $ticket_list[] = $test;
                   }

                
                ?>
            </div>
        </div>
        <div class="center desktop-only" >

        </div>
    </div>

</body>
</html>
