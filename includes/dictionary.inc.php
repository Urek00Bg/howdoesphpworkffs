<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $word =$_POST['word'];
    $meaning =$_POST['meaning'];
    $meaning2 =$_POST['meaning2'];
    $meaning3 =$_POST['meaning3'];
    $meaning4 =$_POST['meaning4'];


    try {
        require_once 'dbh.inc.php';
        require_once 'dictionary_model.inc.php';
        require_once 'dictionary_contr.inc.php';

        //ERROR HANDLERS
        $errors = [];

        $dict = get_words($pdo);


        if (is_input_empty($word,$meaning,$meaning2,$meaning3,$meaning4)){
            $errors["empty_input"] = "Запълнете всички полета";
        }

        if ($errors) {
            $_SESSION["error_dict"] = $errors;
            header("Location:../index.php");
            die();
        }

        create_word( $pdo, $word,  $meaning, $meaning2, $meaning3, $meaning4);
        header("location:../index.php?word=added");

    } catch (PDOException $e) {
        die("Грешка при свързването:" . $e->getMessage());
    }
} else {
    header("Location:../index.php");
    die();
}