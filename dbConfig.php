<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "thousesl"; // Replace with your database name
    
    $conn = new mysqli($servername, $username, $password, $database, 3308);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }