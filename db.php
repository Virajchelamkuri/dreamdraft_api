<?php
// Database connection details
$host = getenv('DB_HOST') ?: '127.0.0.1';  // Use DB_HOST environment variable or fallback to localhost
$username = getenv('DB_USER') ?: 'root';   // Use DB_USER environment variable or fallback to root
$password = getenv('DB_PASSWORD') ?: '';   // Use DB_PASSWORD environment variable or fallback to empty
$database = getenv('DB_NAME') ?: 'dreamdraft';  // Use DB_NAME environment variable or fallback to 'dreamdraft'

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
