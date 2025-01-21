<?php
require_once("dbConfig.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartTable = $_POST['cartTable'];
    $itemCode = $_POST['itemCode'];

    $sql = "DELETE FROM $cartTable WHERE itemCode = '$itemCode' AND usersId = '" . $_SESSION["userEmail"] . "';";
    if ($conn->query($sql) === TRUE) {
        echo "Item removed successfully.";
    } else {
        echo "Error removing item: " . $conn->error;
    }

    // Redirect back to the cart page
    header("Location: addTocart.php");
    exit();
}
?>