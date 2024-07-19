<?php

declare(strict_types=1);

function insert_words(object $pdo,string $word, string $meaning,string $meaning2,string $meaning3, string $meaning4)
{
    $query = "INSERT into words (duma,znachenie,znachenie2,znachenie3,znachenie4) values (:duma, :znachenie,:znachenie2,:znachenie3,:znachenie4);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":duma", $word);
    $stmt->bindParam(":znachenie", $meaning);
    $stmt->bindParam(":znachenie2", $meaning2);
    $stmt->bindParam(":znachenie3", $meaning3);
    $stmt->bindParam(":znachenie4", $meaning4);
    $stmt->execute();
}
function get_words(object $pdo){
    $query = "SELECT * FROM words order by time_added desc" ;
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}