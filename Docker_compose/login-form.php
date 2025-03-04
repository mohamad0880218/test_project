<?php
// login.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Database connection
    $servername = "localhost";  // Replace with your DB server if needed
    $db_username = "root";  // Replace with your DB username
    $db_password = "";  // Replace with your DB password
    $dbname = "ecommerce";  // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check the user's credentials
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Check if the password is correct
        if (password_verify($pass, $row['password'])) {
            // If correct, redirect to homepage (or dashboard)
            header("Location: index.html");  // Redirect to homepage or dashboard
            exit();
        } else {
            // If password is incorrect
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        // If username doesn't exist
        $error_message = "No account found with that username.";
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS_files/login-form.css">
    <script src="JS_files/login-form.js"></script>
</head>
<body style="background-image:url('Images/login-background.jpg');background-size: cover;">
    <div class="container">
        <div class="container form bg-white pt-5 mt-4 mb-3">
            <p class="text-center login-heading hide-me">login</p>
            <div class="container hide-me">
                <!-- Login Form -->
                <form action="login.php" method="POST">
                    <!-- Username Input -->
                    <div class="row mt-4">
                        <div class="col-2 text-center pt-1 pr-0">
                            <i class="fa fa-user-o" aria-hidden="true" id="user"></i>
                        </div>
                        <div class="col-10 pl-0">
                            <input type="text" name="username" placeholder="Type your username" class='input-1' required>
                        </div>
                    </div>
                    <hr class="hr-1">

                    <!-- Password Input -->
                    <div class="row mt-4">
                        <div class="col-2 text-center pt-1 pr-0">
                            <i class="fa fa-lock" aria-hidden="true" id="lock"></i>
                        </div>
                        <div class="col-10 pl-0">
                            <input type="password" name="password" placeholder="Type your password" class="input-2" required>
                        </div>
                    </div>
                    <hr class="hr-2">

                    <!-- Error message if login fails -->
                    <?php
                    if (isset($error_message)) {
                        echo "<div class='alert alert-danger'>$error_message</div>";
                    }
                    ?>

                    <!-- Submit Button -->
                    <div class="row mt-4">
                        <div class="col pl-5 pr-5">
                            <button type="submit" class="btn btn-block text-white login-button">Login</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Additional Content (Optional) -->
            <p class="text-center login-heading show-me">sign up</p>
            <!-- You can keep the rest of your content like signup forms here if necessary -->
        </div>
    </div>
</body>
</html>
