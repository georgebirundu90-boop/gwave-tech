
<?php

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "gwave_tech_db";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check if connection was successful
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>
