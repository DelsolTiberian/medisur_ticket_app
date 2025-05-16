<?php

function db_request_ticket(string $sql, array $params, string $db_path) {
    try {
        $pdo = new PDO("sqlite:$db_path");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return true;

    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout à la base de données : " . $e->getMessage();
        return false;
    }
}

function db_request($command, $param = [], $path = ".\database.sqlite") {
    $pdo = new PDO("sqlite:" . $path);
    $stmt = $pdo->prepare($command);
    $stmt->execute($param);
    $pdo = null;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};
?>


