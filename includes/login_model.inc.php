<?php

declare(strict_types=1);

function get_user(object $pdo,string $username){
    $query = "SELECT * FROM register WHERE studentName  = :studentName;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentName", $username);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}