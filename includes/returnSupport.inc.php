<?php

// Include database configuration
require_once("../dbConfig.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $phone = trim($_POST['contact']);
    $email = trim($_POST['email']);
    $orderNo = trim($_POST['order_number']);
    $service = trim($_POST['service']);
    $message = trim($_POST['message']);

    // Handle file upload
    $fileName = $_FILES['image']['name'];
    $targetDir = "../customers/"; // Directory to save uploaded files
    $targetFile = $targetDir . basename($fileName);

    if (!empty($fileName)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Insert data with file into the database
            $stmt = $conn->prepare(
                "INSERT INTO customer_return (name, phone, email, orderNo, service, message, document) 
                 VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param("sssssss", $name, $phone, $email, $orderNo, $service, $message, $fileName);

            if ($stmt->execute()) {
                echo "Your request has been submitted successfully with the file.";
            } else {
                echo "Database Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error uploading the file.";
        }
    } else {
        // Insert data without a file if no file is uploaded
        $stmt = $conn->prepare(
            "INSERT INTO customer_return (name, phone, email, orderNo, service, message, document) 
             VALUES (?, ?, ?, ?, ?, ?, NULL)"
        );
        $stmt->bind_param("ssssss", $name, $phone, $email, $orderNo, $service, $message);

        if ($stmt->execute()) {
            echo "Your request has been submitted successfully without a file.";
        } else {
            echo "Database Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>