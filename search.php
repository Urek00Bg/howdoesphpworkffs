<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userSearch = $_POST["usersearch"];
        try{
            require_once "includes/dbh.inc.php";

            $query = "SELECT * FROM words WHERE duma = :usersearch or znachenie = :usersearch or znachenie2 = :usersearch or znachenie3 = :usersearch or znachenie4 = :usersearch";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":usersearch", $userSearch);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null;
            $stmt = null;
        } catch (PDOException $e){
            die("Query failed: " . $e->getMessage());
        }
    } else{
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <script src="https://kit.fontawesome.com/89708da992.js" crossorigin="anonymous"></script>
    </head>


    <body>
        <section>
        <?php


if (empty($results)){
    echo "<div>";
    echo "<p>Няма намерени резултати</p>";
    echo("<button class='back-to-home' onclick=\"location.href='index.php'\"><i class='fa-solid fa-1x fa-house'></i> </button>");
    echo "<div>";
}
else{
    echo("<button class='back-to-home' onclick=\"location.href='index.php'\"><i class='fa-solid fa-1x fa-house'></i> </button>");
    echo "<h3>Намерените резултати за: <span class='user_name'>$userSearch</span> са</h3>";
    ?>
    <table style="border: 1px solid red;">
    <tr>
      <th>Дума</th>
      <th>Превод</th>
      <th>2-значение</th>
      <th>3-значение</th>
      <th>4-значение</th>
    </tr>
  <?php
    foreach ($results as $row){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["duma"]);
        echo "<td>" . htmlspecialchars($row["znachenie"]);
        echo "<td>" . htmlspecialchars($row["znachenie2"]);
        echo "<td>" . htmlspecialchars($row["znachenie3"]);
        echo "<td>" . htmlspecialchars($row["znachenie4"]);
        echo "</tr>";


        /*
        echo htmlspecialchars($row["identifier"])."<br>";
        */
        

    }
    echo "</table>";
}

?>
        <section>

    </body>
</html>
