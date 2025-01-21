<?php
// Include your database configuration file
require_once("../dbConfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $tshirtID = mysqli_real_escape_string($conn, $_POST["tshirtID"]);
    $DBupdate = mysqli_real_escape_string($conn, $_POST["DBupdate"]);
    $tNowPrice = floatval($_POST["itemNowPrice"]);
    $tThenPrice = floatval($_POST["itemThenPrice"]);
    $quantity = intval($_POST["itemQuantity"]);

    // Define the table based on DBupdate value
    $table = "";
    switch ($DBupdate) {
        case '1':
            $table = "mensactivewear";
            break;
        case '2':
            $table = "menscrewneck";
            break;
        case '3':
            $table = "polopcks";
            break;
        case '4':
            $table = "valuepcks";
            break;
        case '5':
            $table = "casualshorts";
            break;
        default:
            echo "Invalid update type.";
            exit();
    }

    // Create and execute the SQL query
    if ($table !== "") {
        $sql = "UPDATE $table 
                SET tNowPrice = ?, 
                    tThenPrice = ?, 
                    quantity = ? 
                WHERE tshirtID = ?";

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ddis", $tNowPrice, $tThenPrice, $quantity, $tshirtID);

        if ($stmt->execute()) {
            echo "<script>alert('Update succesfully');
                     window.location.href = '../adminPannel.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>