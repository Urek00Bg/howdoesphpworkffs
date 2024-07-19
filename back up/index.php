<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school-test";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        

        $sql = "SELECT * FROM words order by time_added desc LIMIT 10" ;
        $result = $conn->query($sql);

        $value_grab = "SELECT * FROM tags";
        $value_result = $conn->query($value_grab);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>School Website</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css-holder/style.css">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        
    <div class="insert-form-holder">
        <div class="form">
            <form action="./php-files/insert.php" method="POST">
                <h1 class="form-reason">Добавете Дума</h1>
                <p class="word">Дума: <input type="text" name="word" required></p>
                <p class="meaning">Значение: <input type="text" name="meaning" required></p>
                <p class="meaning">Значение 1: <input type="text" name="meaning2"></p>
                <p class="meaning">Значение 2: <input type="text" name="meaning3"></p>
                <p class="meaning">Значение 3: <input type="text" name="meaning4"></p>
                <input class="button" type="submit" value="Добави">
            </form>
            <div class="nav">
             <a href="display.php"><button class="button-nav">Към речника</button></a>
            </div>
        </div>
    </div>

    <div class='table-text-holder'>
        

        <div class='table'>
    <?php

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<table style='width:100%'>";
            echo '<tr>';
            echo '<th>Дума/Израз</th>';
            echo '<th>Значение</th>';
            echo '<th>Значение 2</th>';
            echo '<th class="mobile">Значение 3</th>';
            echo '<th>Тагове</th>';
            echo '<th class="mobile">дата и час</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>'.$row["duma"].'</td>';
            echo '<td>'.$row["znachenie"].'</td>';
            echo '<td>'.$row["znachenie2"].'</td>';
            echo '<td class="mobile">'.$row["znachenie3"].'</td>';
            echo '<td>'.$row["tags"].'</td>';
            echo '<td class="mobile">'.$row["time_added"].'</td>';
            echo '</tr>';
            echo "</table>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>
        
        </div>

    </body>
</html>