<?php
// Database connection
$servername = "finalproject1.mysql.database.azure.com"; // Change this if your database is hosted elsewhere
$username = "rizwan"; // Change this to your database username
$password = "Pubg@39168"; // Change this to your database password
$dbname = "mysql"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);
// Create connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection
$conn->close();
?>
