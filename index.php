<?php
$serverName = "finalproject1.mysql.database.azure.com";
$connectionOptions = array(
    "Database" => "mysql",
    "Uid" => "rizwan",
    "PWD" => "Pubg@39168"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection
$conn->close();
?>

