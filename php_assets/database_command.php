<?php

function db_select($command, $path = ".\database.sqlite") {
    /**
     * Executes a SELECT query on a SQLite database.
     *
     * @param string $command Unused parameter for the SQL command.
     * @param string $path Path to the SQLite database file (default: "./database.sqlite").
     *
     * @return mixed The first row of the 'user' table as an associative array.
     */
    $pdo = new PDO("sqlite:" . $path);
    $request = $pdo->query($command);
    return $request->fetch();
}


