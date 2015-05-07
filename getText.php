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

$sql = "SELECT * FROM webchat_chat ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["author"] == $author){
        if($row["type"] == "img"){
          echo "<p class='right image-right'><small class='time'>" . $row["ts"]. "</small><br><img class='chatimage' src='" . $row["message"]. "'></p>";
        }
        else{
          echo "<p class='right'><small class='time-right'>" . $row["ts"]. "</small>" . $row["message"]. "</p>";
        }
      }
      else{
        if($row["type"] == "img"){
          echo "<p class='left image-left'><small class='orange'>" . $row["author"]. "</small><small class='time'>" . $row["ts"]. "</small><br><img src='" . $row["message"]. "'></p>";
        }
        else{
          echo "<p class='left'><small class='orange'>" . $row["author"] . ":</small><small class='time'>" . $row["ts"]. "</small><br> " . $row["message"]. "</p>";
        }
      }  
    }
} else {
    echo "0 results";
}
$conn->close();
?>