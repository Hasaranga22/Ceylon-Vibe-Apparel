<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝙲𝚎𝚢𝚕𝚘𝚗 𝚅𝚒𝚋𝚎𝚜 𝙰𝚙𝚙𝚊𝚛𝚎𝚕
    </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css files/index.css">
    <link rel="stylesheet" href="css files/loginSignup.css">
    <link rel="stylesheet" href="css files/customerSupport.css">
    <link rel="stylesheet" href="css files/sizeChart.css">
    <link rel="stylesheet" href="css files/privacyPolicy.css">
    <link rel="stylesheet" href="css files/terms.css">
    <link rel="stylesheet" href="css files/reviews.css">
    <link rel="stylesheet" href="css files/myAccount.css">
    <link rel="stylesheet" href="css files/clothsDetails.css">
    <link rel="stylesheet" href="css files/checkOut.css">
    <link rel="stylesheet" href="css files/addTocart.css">
    <link rel="stylesheet" href="css files/checkoutCard.css">
    <!-- <link rel="stylesheet" href="css files/adminPannel.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

</head>

<body>
    <nav class="navbar">
        <div class="logo"><a href="index.php">𝙲𝚎𝚢𝚕𝚘𝚗 𝚅𝚒𝚋𝚎𝚜 𝙰𝚙𝚙𝚊𝚛𝚎𝚕</a></div>
        <div class="search-bar">
            <select class="category">
                <option value="all">All</option>
                <option value="all">Men’s Activewear & Sportswear</option>
                <option value="all">Men’s Plain T-Shirts</option>
                <option value="all">Men’s Crew Neck T-Shirts</option>
                <option value="all">Men’s Polo T-Shirts</option>
                <option value="all">Men’s Long Sleeve T-Shirts</option>
                <option value="all">Armour+ Reusable Face Masks</option>
                <option value="all">View All Products</option>
            </select>
            <input type="text" placeholder="I'm shopping for..." class="search-input">
            <button class="search-btn">Search</button>
        </div>
        <div class="nav-links">
            <div class="cart">
                <span class="cart-icon"><a href="addTocart.php" style="text-decoration:none">🛒</a></span>
            </div>
            <div class="auth">
                <?php
                if (isset($_SESSION["userEmail"])) {
                    // Add a logout link and a profile link if the user is logged in
                    echo "<a href='myAccount.php'><i class='fa-solid fa-user'></i>" . $_SESSION["userEmail"] . '</a></li>';
                } else {
                    // Show the login link if the user is not logged in
                    echo " <a href='loginSignup.php' class='register'><i class='fa-solid fa-user'></i> Login/Register</a>";
                }
                ?>
            </div>
        </div>
    </nav>