<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatdb";

if(isset($_GET["name"])){
  $author = $_GET["name"];
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$sql = "INSERT INTO webchat_chat (author, message)
VALUES ('John', 'Doe')"; */

$sql = "SELECT * FROM users ORDER BY status DESC , user_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["status"] == "online"){
        echo "<li class='text-success'>" . $row["user_name"]. "</li>";
      }
      else{
        echo "<li class='text-muted'>" . $row["user_name"]. "</li>";
      }  
    }
} else {
    echo "No users";
}
$conn->close();
?>