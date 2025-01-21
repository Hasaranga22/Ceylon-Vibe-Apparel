<?php

session_start();

if (isset($_SESSION["userEmail"])) {
    
    session_abort();
    require_once("header.php");
    require_once("dbConfig.php");
    

    $totalBill = 0; // Initialize total bill

    echo "<table class='tableCart'>
        <tr>
            <th>ITEM</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>SIZE</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
            <th>ACTION</th>
        </tr>";

    // Define cart and product tables
    $tables = [
        "mensactivewearcart" => "mensactivewear",
        "valuePckscart" => "valuePcks",
        "polopckscart" => "polopcks",
        "menscrewneckcart" => "menscrewneck",
        "casualshortscart" => "casualshorts",
    ];

    foreach ($tables as $cartTable => $itemTable) {
        $sql = "SELECT * FROM $cartTable WHERE usersId = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["userEmail"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemCode = $row["itemCode"];
                $quantity = $row["quantity"];
                $itemSize = $row["itemSize"];

                // Fetch item details
                $sql2 = "SELECT * FROM $itemTable WHERE tshirtID = ?;";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("s", $itemCode);
                $stmt2->execute();
                $result2 = $stmt2->get_result();

                if ($result2->num_rows > 0) {
                    $itemRow = $result2->fetch_assoc();
                    $tImage = $itemRow["tImage"];
                    $tName = $itemRow["tName"];
                    $tNowPrice = $itemRow["tNowPrice"];
                    $totalPrice = $tNowPrice * $quantity;

                    // Add to total bill
                    $totalBill += $totalPrice;

                    // Display item row
                    echo "<tr>
                        <td><img src='uploadsNew/$tImage' alt='$tName' style='width:50px;height:50px;'></td>
                        <td>$tName</td>
                        <td>$tNowPrice</td>
                        <td>$itemSize</td>
                        <td>$quantity</td>
                        <td>$totalPrice . 00</td>
                        <td>
                            <form method='post' action='removeItem.php'>
                                <input type='hidden' name='cartTable' value='$cartTable'>
                                <input type='hidden' name='itemCode' value='$itemCode'>
                                <button type='submit' style='background-color: #f44336; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;'>Remove</button>
                            </form>
                        </td>
                    </tr>";
                }
            }
        }
    }

    echo "</table>";

    // Display total bill and checkout button
    if ($totalBill > 0) {
        echo "<div style='width: 75%; margin: 20px auto; text-align: right;'>
            <h3>Total Bill: Rs : $totalBill . 00</h3>
            <form method='post' action='checkout.php'>
                <button type='submit' style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>Checkout</button>
            </form>
          </div>";
    } else {
        echo "<div style='width: 75%; margin: 20px auto; text-align: center;'>
            <h3>Your cart is empty.</h3>
          </div>";
    }

    // Include additional sections
    require_once "footer.php";

} else {
    header("Location:loginSignup.php");
}
?>