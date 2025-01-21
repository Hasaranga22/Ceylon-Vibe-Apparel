<?php

require_once("../dbConfig.php");

if (isset($_POST["remove"])) {
    $removeOrderID = $_POST["id"];

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM checkout WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter
        $stmt->bind_param("i", $removeOrderID); // "i" indicates the parameter is an integer

        // Execute the statement
        if ($stmt->execute()) {
            echo"<script>
                   alert('Order ID $removeOrderID has been successfully removed.');
                   window.location.href='../adminPannel.php';
                </script>";
        } else {
            echo "Error: Could not execute the query. " . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: Could not prepare the query. " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "No action taken. Please provide a valid order ID.";
}
?>