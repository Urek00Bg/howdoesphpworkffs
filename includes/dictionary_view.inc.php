<?php

declare(strict_types=1);

function check_dictionary_errors(){
    if (isset($_SESSION["error_dict"])){
        $errors = $_SESSION["error_dict"];

        echo "<br>";
        
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION["error_dict"]);
    }
}
;

