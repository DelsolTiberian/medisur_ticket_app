<?php
include "./database_command.php";
if (isset($_GET['id'])) {
    db_request("DELETE FROM expense WHERE id = ?", [$_GET['id']], '../database.sqlite');
}