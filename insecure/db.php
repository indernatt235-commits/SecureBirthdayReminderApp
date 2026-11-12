
<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "bdreminder";
$host = "localhost"; // Replace with your actual database host
$username = "your username"; // Replace with your actual database username
$password = "your password"; // Replace with your actual database password
$database = "your database"; // Replace with your actual database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>