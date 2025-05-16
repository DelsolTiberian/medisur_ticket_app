<?php
session_start();

include "./database_command.php";
if (isset($_GET['id']) & isset($_GET['action'])) {
    echo $_GET['action'];
    $date = date("Y-m-d");
    db_request("UPDATE expense SET status = ?, user_validator = ?, modification_datetime = ? WHERE id = ?", [$_GET['action'], $_SESSION['identifier'], $date, $_GET['id']], '../database.sqlite');

}