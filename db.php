<?php
$host = 'localhost';  // This could be the issue
$username = 'root';
$password = '';
$database = 'dreamdraft';
$host = getenv('DB_HOST') ?: 'localhost';  // Read DB_HOST environment variable


$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
