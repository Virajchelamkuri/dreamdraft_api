<?php
$host = 'localhost';  // This could be the issue
$username = 'root';
$password = '';
$database = 'dreamdraft';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
