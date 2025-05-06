<?php

function db_request($command, $param = [], $path = ".\database.sqlite") {
    $pdo = new PDO("sqlite:" . $path);
    $stmt = $pdo->prepare($command);
    $stmt->execute($param);
    $pdo = null;
    return $stmt->fetch();
};