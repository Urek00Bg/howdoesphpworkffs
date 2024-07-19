<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/dictionary_view.inc.php';

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h3>
        <?php
        output_username()
        ?>
    </h3>

    
    <?php
    #IF LOGGED IN DON'T SHOW LOG-IN AND REGISTER FORM, SHOW LOG-OUT BUTTON
        if(!isset($_SESSION["user_id"])){ ?>
            <h3>Login</h3>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button>Login</button>
            </form>

            <h3>Register</h3>
            <form action="includes/signup.inc.php" method="post">
            <?php 
            signup_inputs();
            ?>
                <button>Register</button>
            </form>
        <?php } else{  ?>
                    <h3>Log out</h3>
                    <form action="includes/logout.inc.php" method="post">
                        <button>log out</button>
                    </form>

                    <form action="includes/dictionary.inc.php" method="POST">
                    <h1 class="form-reason">Добавете Дума</h1>
                    <p class="word">Дума: <input type="text" name="word" ></p>
                    <p class="meaning">Значение: <input type="text" name="meaning" ></p>
                    <p class="meaning">Значение 1: <input type="text" name="meaning2"></p>
                    <p class="meaning">Значение 2: <input type="text" name="meaning3"></p>
                    <p class="meaning">Значение 3: <input type="text" name="meaning4"></p>
                    <input class="button" type="submit" value="Добави">
                    </form>   
       <?php } ?>

       <?php
    check_dictionary_errors()
    ?>
    <?php
    check_login_errors()
    ?>
    <?php
    check_signup_errors();
    ?>

    </body>
</html>