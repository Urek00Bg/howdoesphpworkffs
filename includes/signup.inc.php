<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];


    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd)){
            $errors["empty_input"] = "Запълнете всички полета";
        }
        if (is_username_taken($pdo , $username)){
            $errors["username_taken"] = "Името е заето";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["error_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "password" => $pwd,
            ];
            $_SESSION["signup_data"] = $signupData;


            header("Location:../index.php");
            die();
        }

        create_user($pdo,$username,$pwd);
        header("location:../index.php?signup=success");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Грешка при свързването:" . $e->getMessage());
    }
} else {
    header("Location:../index.php");
    die();
}