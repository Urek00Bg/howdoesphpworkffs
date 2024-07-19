<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';


        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd)){
            $errors["empty_input"] = "Запълнете всички полета";
        }
        $result = get_user($pdo,$username);
        if (is_username_wrong($result)){
            $errors["login_incorrect"] = "Грешно име";
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd,$result["studentPass"])){
            $errors["login_incorrect"] = "Грешно парола";
        }
        
        require_once 'config_session.inc.php';
        
        if ($errors) {
            $_SESSION["error_login"] = $errors;
        
            header("Location:../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["studentID"];
        session_id($sessionId);

        
        $_SESSION["user_id"] = $result["studentID"];
        $_SESSION["user_username"] = htmlspecialchars($result["studentName"]);
        
        $_SESSION["last_regeneration"] = time();

        header("location: ../index.php?login=success");
        $pdo = null;
        $stmt = null;
        
        die();
        
    }catch (PDOException $e) {
        die("Грешка при свързването:" . $e->getMessage());
    }

}else {
    header("Location:../index.php");
    die();
}
