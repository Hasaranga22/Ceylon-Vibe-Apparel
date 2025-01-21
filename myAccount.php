<?php

require_once("header.php");

?>


<div class="myAccountDashBoardWrapper">
    <div class="myAccountDashBoard">
        <div class="userSec1">
            <img src="images/profile.png" alt="">
            <div class="userSec1Inner">
                <h2>Hello !</h2>

                <?php
                if (isset($_SESSION["userEmail"])) {
                    echo "<h3>" . $_SESSION["userEmail"] . "</h3>";
                } else {
                    echo "<h3>User Name shows here</h3>";
                }
                ?>
            </div>
        </div>

        <div class="userSec2">
            <table>
                <tr>
                    <td><button onclick="gotoHome()">Explore Collections</button></td>
                </tr>
                <tr>
                    <td><button onclick="gotoCart()">Cart Items</button></td>
                </tr>
                <tr>
                    <td><button>Account Details</button></td>
                </tr>
                <tr>
                    <td><button>Cinfirm Orders</button></td>
                </tr>
                <tr>
                    <td><button onclick="logoutFunction()">Logout</button></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="checkout-section">
        <?php

        if (isset($_SESSION["userEmail"])) {
            require_once("dbConfig.php");

            $sql = 'SELECT * FROM checkOut WHERE email = "' . $_SESSION["userEmail"] . '";';

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='checkout-card'>
                <h2>Checkout Successful<i class='fa-solid fa-circle-check' style='margin-left:8px'></i></h2>
                <table class='checkout-table'>
                    <thead>
                        <tr>
                            <th>Order-id</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Order Note</th>
                            <th>Item Image</th>
                            <th>Item Name</th>
                            <th>Item Size</th>
                            <th>Quantity</th>
                            <th>Item Total</th>
                        </tr>
                    </thead>
                    <tbody>";

                $totalBill = 0; // Initialize total bill variable
        
                while ($row = $result->fetch_assoc()) {
                    // Update total bill for each row
                    $totalBill = $row['totalBill'];


                    // Display individual item details
                    echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['phone']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['note']) . "</td>
                    <td><img src='uploadsNew/" . htmlspecialchars($row['itemImage']) . "' alt='" . htmlspecialchars($row['itemName']) . "' class='item-image'></td>
                    <td>" . htmlspecialchars($row['itemName']) . "</td>
                    <td>" . htmlspecialchars($row['itemSize']) . "</td>
                    <td>" . htmlspecialchars($row['quantity']) . "</td>
                    <td>" . htmlspecialchars($row['itemTotal']) . "</td>
                  </tr>";

                }
                echo "</tbody>
            </table>
        </div>";
            }
        } else {
            // If no checkout data, display welcome message
            if (isset($_SESSION["userEmail"])) {
                echo "<div class='welcome-message'>
                    <h2>Welcome, " . htmlspecialchars($_SESSION["userEmail"]) . "!</h2>
                    <p style='max-width: 850px; line-height: 1.8; font-size: 16px; color: #555;'>
                        Welcome to <strong>Ceylon Vibes Apparel</strong>, your ultimate destination for trendy, high-quality, and affordable t-shirts! 🎉<br><br>
                        We take pride in offering a diverse range of styles, colors, and designs to suit every personality and occasion. Whether you're looking for classic basics, eye-catching graphic tees, or comfortable everyday wear, we've got something perfect for you!<br><br>
                        At <strong>[Your Website Name]</strong>, we believe fashion should be fun and accessible. That’s why we source the finest materials and ensure every product is crafted with care and durability in mind.<br><br>
                        Explore our collections, customize your style, enjoy fast delivery, and experience excellent customer service. Your perfect t-shirt is just a few clicks away!<br><br>
                        Thank you for choosing <strong>Ceylon Vibes Apparel</strong>. Happy shopping! 😊
                    </p>
                    <a href='index.php' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #4CAF50; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold;'>
                        Visit the Store and Find Your Style! &rarr;
                    </a>
                  </div>";
            } else {
                echo "<p>Welcome, Guest! Please <a href='loginSignup.php'>log in</a> to access your dashboard.</p>";
            }
        }
        ?>
        <P>If you check Out Succesfully ,<strong>Ceylon Vibes Apparel</strong> Our admin will complete placement of your
            order .Thank You</P>
    </div>
</div>

<script>
    function logoutFunction() {
        window.location.href = 'includes/logOut.inc.php';
    }

    function gotoCart() {
        window.location.href = 'addTocart.php';
    }

    function gotoHome() {
        window.location.href = 'index.php';
    }
</script>

<?php

require_once("reviews.php");

?>


<?php

require_once("footer.php");

?>