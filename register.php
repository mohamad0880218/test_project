<?php
// Database connection
$servername = "db:3306"; // Change this if your database is hosted elsewhere
$username = "username"; // Change this to your database username
$password = "password"; // Change this to your database password
$dbname = "website"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection
$conn->close();
?>
