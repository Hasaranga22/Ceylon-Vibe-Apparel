<?php
session_start();
if (!isset($_SESSION["adminEmail"])) {
    header("Location: ../loginSignup.php"); // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #34495e;
        }

        .sidebar ul li.active {
            background-color: #2980b9;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .data-display {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            width: fit-content;
        }

        .data-display table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-display table th,
        .data-display table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .data-display table th {
            background-color: #2980b9;
            color: white;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            position: fixed;
            width: calc(100% - 250px);
            top: 0;
            left: 250px;
            z-index: 1000;
        }

        .btnSection {
            margin-left: 35rem;
        }

        .header button {
            padding: 14px 19px;
            background-color: #34495e;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .header button:hover {
            background-color: rgb(112, 116, 119);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2><a href="adminPannel.php" style="text-decoration:none;color:white;font-size:25px">Admin Dashboard</a></h2>
        <ul>
            <li onclick="loadContent('user')">User Management</li>
            <li onclick="loadContent('orders')">Pending Orders</li>
            <li onclick="loadContent('activewear')">Active Wear Clothes</li>
            <li onclick="loadContent('crewneck')">Crewneck Clothes</li>
            <li onclick="loadContent('polo')">Polo T-Shirts</li>
            <li onclick="loadContent('valuepacks')">Value Packs</li>
            <li onclick="loadContent('shorts')">Shorts</li>
            <li onclick="loadContent('customersupport')">Customer Support</li>
        </ul>
    </div>

    <div class="header">
        <h1>Welcome, <?php echo $_SESSION["adminEmail"]; ?></h1>
        <div class="btnSection">
            <button onclick="visitWebsite()">Visit Website</button>
            <button onclick="logout()">Logout</button>
        </div>
    </div>

    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
        <div class="data-display" id="dataDisplay">
            <p>Select a category from the sidebar to view details.</p>
        </div>
    </div>

    <script>
        function loadContent(contentType) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "loadContent.php?content=" + contentType, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("dataDisplay").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function visitWebsite() {
            window.location.href = "index.php";
        }

        function logout() {
            window.location.href = "includes/logOut.inc.php";
        }
    </script>
</body>

</html>