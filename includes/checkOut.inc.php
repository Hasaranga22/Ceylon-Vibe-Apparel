<?php
session_start();

if (isset($_SESSION["userEmail"])) {


    // Check if POST variables are set
    if (isset($_POST["submit"])) {
        $userId = $_SESSION["userEmail"];
        $addItem = $_POST["tshirtID"];
        $addItemQuantity = $_POST["quantity"];
        $addItemSize = $_POST["size"];
        $dataBaseSelect = $_POST["forDB"];
        // Fetch items from the database

        require_once("../dbConfig.php");

        if ($dataBaseSelect == "1") {
            $sql = "INSERT into mensactivewearcart values ('','$addItem','$addItemQuantity','$addItemSize','$userId');";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>
                    alert('Item added to checkout successfully');
                    window.location.href = '../addTocart.php';  // Redirect after alert
                  </script>";
            } else {
                echo "<script>
                    alert('Failed to add item to cart.');
                    window.location.href = '../index.php';  // Redirect after alert
                  </script>";
            }


        } else if ($dataBaseSelect == "2") {
            $sql = "INSERT into menscrewneckcart values ('','$addItem','$addItemQuantity','$addItemSize','$userId');";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>
                    alert('Item added to cart successfully');
                    window.location.href = '../addTocart.php';  // Redirect after alert
                  </script>";
            } else {
                echo "<script>
                    alert('Failed to add item to cart.');
                    window.location.href = '../index.php';  // Redirect after alert
                  </script>";
            }


        } else if ($dataBaseSelect == "3") {
            $sql = "INSERT into polopckscart values ('','$addItem','$addItemQuantity','$addItemSize','$userId');";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>
                    alert('Item added to cart successfully');
                    window.location.href = '../addTocart.php';  // Redirect after alert
                  </script>";
            } else {
                echo "<script>
                    alert('Failed to add item to cart.');
                    window.location.href = '../index.php';  // Redirect after alert
                  </script>";
            }


        } else if ($dataBaseSelect == "4") {
            $sql = "INSERT into valuepckscart values ('','$addItem','$addItemQuantity','$addItemSize','$userId');";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>
                    alert('Item added to cart successfully');
                    window.location.href = '../addTocart.php';  // Redirect after alert
                  </script>";
            } else {
                echo "<script>
                    alert('Failed to add item to cart.');
                    window.location.href = '../index.php';  // Redirect after alert
                  </script>";
            }


        } else if ($dataBaseSelect == "5") {
            $sql = "INSERT into casualshortscart values ('','$addItem','$addItemQuantity','$addItemSize','$userId');";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>
                    alert('Item added to cart successfully');
                    window.location.href = '../addTocart.php';  // Redirect after alert
                  </script>";
            } else {
                echo "<script>
                    alert('Failed to add item to cart.');
                    window.location.href = '../index.php';  // Redirect after alert
                  </script>";
            }
        }
    }

} else {
    echo "<script>
                alert('You have to login or Sign up first');
                window.location.href = '../loginSignup.php';  // Redirect after alert
                 </script>";
    exit();
}
?>