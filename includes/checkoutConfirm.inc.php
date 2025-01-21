<?php
require_once("../dbConfig.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $note = $_POST['orderNote'];
    $totalBill = $_POST['totalBill'];
    $items = $_POST['items']; // Array of cart items

    $conn->begin_transaction();

    try {
        foreach ($items as $item) {
            $itemCode = $item['itemCode'];
            $itemImage = $item['itemImage'];
            $itemName = $item['itemName'];
            $itemSize = $item['itemSize'];
            $quantity = $item['quantity'];
            $itemTotal = $item['itemTotal'];

            $stmt = $conn->prepare("INSERT INTO checkOut 
                (firstName, lastName, address, country, phone, email, note, itemCode, itemImage, itemName, itemSize, quantity, itemTotal, totalBill)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssssssssssiii",
                $firstName,
                $lastName,
                $address,
                $country,
                $phone,
                $email,
                $note,
                $itemCode,
                $itemImage,
                $itemName,
                $itemSize,
                $quantity,
                $itemTotal,
                $totalBill
            );
            $stmt->execute();
        }

        $conn->commit();
        echo "<script>
        alert('Order Placed Successfully');
        window.location.href = '../myAccount.php';
      </script>";
        exit();

    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../checkOut.php");
    exit();
}
?>