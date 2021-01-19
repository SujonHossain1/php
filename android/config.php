<?php
$servername = "localhost";
$username = "queendoh_sabuj";
$password = "!@#sabuj#@!";
$db="queendoh_queen";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>