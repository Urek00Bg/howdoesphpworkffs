<?php

declare(strict_types=1);



function get_username(object $pdo, string $username)
{
    $query = "SELECT studentName FROM register WHERE studentName  = :studentName;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentName", $username);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function set_user(object $pdo,string $username, string $pwd)
{
    $query = "INSERT into register (studentName,studentPass) values (:studentName, :pwd);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":studentName", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();
}