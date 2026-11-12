
<?php
// Content Security Policy
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self' data:; object-src 'none'; base-uri 'self'; frame-ancestors 'none'");

// Prevent MIME type sniffing
header("X-Content-Type-Options: nosniff");

// Prevent the browser from loading the page in another website's frame
header("X-Frame-Options: DENY");

// Control referrer information
header("Referrer-Policy: strict-origin-when-cross-origin");

$host = "localhost";
$username = "root";
$password = "";
$database = "bdreminder";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>