<?php

declare(strict_types=1);

function signup_inputs(){


    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
       echo '<input type="text" name="username" placeholder="Username" value="'.$_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username"><br>';
    }
    
    echo '<input type="password" name="pwd" placeholder="Password"><br>';

}

function check_signup_errors() 
{
    if(isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        echo "<br>";
        
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION["error_signup"]);
    }else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p>Успешно се регистрирахте!</p>';
    }
}