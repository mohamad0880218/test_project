<?php
    $con = mysqli_init();
    mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
    mysqli_real_connect($conn, "finalproject1.mysql.database.azure.com", "rizwan    ", "{Pubg@39168}", "{mysql}", 3306, MYSQLI_CLIENT_SSL);
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }

    echo "Connected successfully";

// Close connection
    $cnn->close();
?>


