<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatdb";

$author = $_POST["name"];
$status = $_POST["status"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$sql = "INSERT INTO webchat_chat (author, message)
VALUES ('John', 'Doe')"; */

//$sql = "UPDATE users SET 'status=" . $status . "' WHERE 'user_name=" . $author . "' ;";
$sql = "UPDATE users SET status='" . $status . "' WHERE user_name='"
 . $author . "';";

if ($conn->query($sql) === TRUE) {
    //todo here
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>