<html>
    <body>
    <h1>Data inserted</h1>
    </body>
</html>
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

$word =$_POST['word'];
$meaning =$_POST['meaning'];
$meaning2 =$_POST['meaning2'];
$meaning3 =$_POST['meaning3'];
$meaning4 =$_POST['meaning4'];


$sql = "INSERT INTO words (`duma`, `znachenie`, `znachenie2`, `znachenie3`, `znachenie4`) VALUES ('$word','$meaning','$meaning2','$meaning3','$meaning4')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();