<?php

require_once("header.php");

?>

<div class="option">
    <p>Have an account? <a href="loginSignup.php">Log In</a> for faster checkouts. Or continue as a Guest.</p>
</div>

<?php
// Define the tables mapping
$tables = [
    "mensactivewearcart" => "mensactivewear",
    "valuePckscart" => "valuePcks",
    "polopckscart" => "polopcks",
    "menscrewneckcart" => "menscrewneck",
    "casualshortscart" => "casualshorts",
];

// Initialize total bill
$totalBill = 0;

// Include database connection
require_once("dbConfig.php");
?>



<div class="division">
    <form method="post" action="includes/checkoutConfirm.inc.php" id="checkoutForm">
        <h2>Checkout Form</h2>
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br>

        <label for="country">Country:</label>
        <input type="text" name="country" id="country" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"
            value="<?php echo htmlspecialchars($_SESSION['userEmail'], ENT_QUOTES, 'UTF-8'); ?>" readonly><br>

        <label for="orderNote">Order Note (Optional):</label>
        <textarea name="orderNote" id="orderNote"></textarea><br>

        <?php
        foreach ($tables as $cartTable => $itemTable) {
            $sql = "SELECT * FROM $cartTable WHERE usersId = ?;";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                die("Error preparing query: " . $conn->error);
            }

            $stmt->bind_param("s", $_SESSION["userEmail"]);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $itemCode = $row["itemCode"];
                    $quantity = $row["quantity"];
                    $itemSize = $row["itemSize"];
                    $sql2 = "SELECT * FROM $itemTable WHERE tshirtID = ?;";
                    $stmt2 = $conn->prepare($sql2);

                    if (!$stmt2) {
                        die("Error preparing query: " . $conn->error);
                    }

                    $stmt2->bind_param("s", $itemCode);
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();

                    if ($result2->num_rows > 0) {
                        $itemRow = $result2->fetch_assoc();
                        $tImage = htmlspecialchars($itemRow["tImage"], ENT_QUOTES, 'UTF-8');
                        $tName = htmlspecialchars($itemRow["tName"], ENT_QUOTES, 'UTF-8');
                        $tNowPrice = $itemRow["tNowPrice"];
                        $totalPrice = $tNowPrice * $quantity;
                        $totalBill += $totalPrice;

                        // Hidden inputs for checkout submission
                        echo "<input type='hidden' name='items[$itemCode][itemCode]' value='$itemCode'>";
                        echo "<input type='hidden' name='items[$itemCode][itemImage]' value='$tImage'>";
                        echo "<input type='hidden' name='items[$itemCode][itemName]' value='$tName'>";
                        echo "<input type='hidden' name='items[$itemCode][itemSize]' value='$itemSize'>";
                        echo "<input type='hidden' name='items[$itemCode][quantity]' value='$quantity'>";
                        echo "<input type='hidden' name='items[$itemCode][itemTotal]' value='$totalPrice'>";
                    }
                }
            }
        }
        ?>

        <input type="hidden" name="totalBill" value="<?php echo $totalBill; ?>">
        <button type="submit"
            style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Checkout
        </button>
    </form>


    <div class="cartSectionview">
        <?php
        require_once("dbConfig.php");


        $totalBill = 0; // Initialize total bill
        
        echo "<h2 style='text-align:center'>Checkout items</h2>";
        echo "<table class='tableCart'>
        <tr>
            <th>ITEM</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>SIZE</th>
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
            <td>$quantity</td>
            <td>$itemSize</td>
            <td>$totalPrice.00</td>
            <td>
                <form method='post' action='removeItem.php'>
                    <input type='hidden' name='cartTable' value='$cartTable'>
                    <input type='hidden' name='itemCode' value='$itemCode'>
                    <button type='submit'
                        style='background-color: #f44336; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;'>Remove
                    </button>
                </form>
            </td>
        </tr>";
                    }
                }
            }
        }

        echo "
    </table>";

        // Display total bill and checkout button
        if ($totalBill > 0) {
            echo "<div style='width: 75%; margin: 20px auto; text-align: right;'>
        <h3>Total Bill: Rs $totalBill.00</h3>
    </div>";
        } else {
            echo "<div style='width: 75%; margin: 20px auto; text-align: center;'>
        <h3>Your cart is empty.</h3>
    </div>";
        }
        ?>
    </div>
</div>

<?php
require_once("reviews.php");
require_once("footer.php");
?>