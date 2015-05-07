<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatdb";

$author = $_POST["name"];
$message = $_POST["message"];
$type = $_POST["type"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$sql = "INSERT INTO webchat_chat (author, message)
VALUES ('John', 'Doe')"; */

$sql = "INSERT INTO webchat_chat (author, message, type) VALUES ('" . $author . "','" . $message . "','" . $type . "');";

if ($conn->query($sql) === TRUE) {
    //todo here
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>