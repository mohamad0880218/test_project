<?php
// Database connection
$servername = "db";  // The name of the MariaDB service in your Docker Compose file
$username = "username";  // Your database username
$password = "password";  // Your database password
$dbname = "website";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for username and password
$login_username = $login_password = "";
$login_error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $login_username = mysqli_real_escape_string($conn, $_POST['username']);
    $login_password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username and password are provided
    if (empty($login_username) || empty($login_password)) {
        $login_error = "Please enter both username and password.";
    } else {
        // Query the database to check if the username exists and password matches
        $query = "SELECT password FROM users WHERE username = '$login_username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Username exists, check if password matches
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify password
            if (password_verify($login_password, $hashed_password)) {
                // Login successful, redirect to index.html
                header("Location: index.html");
                exit();
            } else {
                // Incorrect password
                $login_error = "Incorrect password. Please try again.";
            }
        } else {
            // Username not found
            $login_error = "Username not found. Please sign up.";
        }
    }
}

$conn->close();
?>
