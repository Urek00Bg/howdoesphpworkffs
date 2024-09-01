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
        <div class="body">
            <div class="section-1">
                <h3>
                    <?php
                    output_username();
                    ?>
                </h3>
            </div>
    <?php
    #IF LOGGED IN DON'T SHOW LOG-IN AND REGISTER FORM, SHOW LOG-OUT BUTTON
        if(!isset($_SESSION["user_id"])){ ?>

            <div class="middle">
                <h1 class="Blagoev">Су "Димитър Благоев"</h1>
                <img src="https://blagoevschool.org/images/Emblema.gif" width="20%">
            </div>
        
        <div class="form-holder">
            <h3>Login</h3>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <button class="button">Login</button>
            </form>


            <h3>Register</h3>
            <form action="includes/signup.inc.php" method="post">
            <?php 
            signup_inputs();
            ?>
                <button class="button">Register</button>
            </form>
        </div>
    </div>
        <?php } else{  ?>


                    <div class="form-holder">
                        <form action="includes/dictionary.inc.php" method="POST">
                        <h1 class="form-reason">Добавете Дума</h1>
                            <p class="word">Дума: <input type="text" name="word" ></p>
                            <p class="meaning">Значение: <input class="add" type="text" name="meaning"></p>
                            <p class="meaning">Значение 1: <input class="add" type="text" name="meaning2"></p>
                            <p class="meaning">Значение 2: <input class="add" type="text" name="meaning3"></p>
                            <p class="meaning">Значение 3: <input class="add" type="text" name="meaning4"></p>
                        <input class="button" type="submit" value="Добави">
                        </form>   
                    </div>

                    <div class="section3">
                        <h3>Log out</h3>
                        <form action="includes/logout.inc.php" method="post">
                            <button class="button">log out</button>
                        </form>
                    </div>
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