<?php
require_once("dbConfig.php");

$content = isset($_GET['content']) ? $_GET['content'] : '';

switch ($content) {
    case 'user':
        loadUser($conn);
        break;
    case 'orders':
        loadOrders($conn);
        break;
    case 'activewear':
        loadActiveWear($conn);
        break;
    case 'crewneck':
        loadCrewNeckWear($conn);
        break;
    case 'polo':
        loadPoloWear($conn);
        break;
    case 'valuepacks':
        loadValuePacks($conn);
        break;
    case 'shorts':
        loadShortsWear($conn);
        break;
    case 'returninquire':
        loadReturnInquire($conn);
        break;
    case 'customersupport':
        loadCustomerSupport($conn);
        break;
    default:
        echo "<p>Select a category to view details.</p>";
}

function loadUser($conn)
{
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>User ID</th>
                <th>User Email</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['usersId'] . "</td><td>" . $row['userEmail'] . "</td></tr>";
    }
    echo "</table>";
}

function loadOrders($conn)
{
    $sql = "SELECT * FROM checkout";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Checkout ID</th>
                <th>Item Name</th>
                <th>Item Size</th>
                <th>Item Quantity</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>User Email</th>
                <th>Note</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['itemName'] . "</td>
                <td>" . $row['itemSize'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['firstName'] . "</td>
                <td>" . $row['lastName'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['note'] . "</td>
                <td>" . $row['orderDate'] . "</td>
                <td><form method='post' action='adminFunctions/removeOrders.inc.php'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit' name='remove' style='background-color: #ff4d4d; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;'>Remove</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
}

function loadActiveWear($conn)
{
    $sql = "SELECT * FROM mensactivewear";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Image</th>
                <th>T-shirt ID</th>
                <th>T-shirt Name</th>
                <th>T-shirt quantity</th>
                <th>Now Price</th>
                <th>Previous Price</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='uploadsNew/" . $row['tImage'] . "' alt='T-shirt Image' style='width:100px;height:auto;'></td>
                <td>" . $row['tshirtID'] . "</td>
                <td>" . $row['tName'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['tNowPrice'] . "</td>
                <td>" . $row['tThenPrice'] . "</td>
                <td>
                    <form method='post' action='adminFunctions/updateQuantity.inc.php'>
                        <input type='hidden' name='tshirtID' value='" . $row['tshirtID'] . "'>
                        <input type = 'text' value='1' name = 'DBset' style='display:none';>
                        <button type='submit' style='background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;'>
                            Update
                        </button></form>
                </td>
            </tr>";
    }
    echo "</table>";
}

function loadCrewNeckWear($conn)
{
    $sql = "SELECT * FROM menscrewneck";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Image</th>
                <th>T-shirt ID</th>
                <th>T-shirt Name</th>
                <th>T-shirt quantity</th>
                <th>Now Price</th>
                <th>Previous Price</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='uploadsNew/" . $row['tImage'] . "' alt='T-shirt Image' style='width:100px;height:auto;'></td>
               <td>" . $row['tshirtID'] . "</td>
                <td>" . $row['tName'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['tNowPrice'] . "</td>
                <td>" . $row['tThenPrice'] . "</td>
                <td>
                    <form method='post' action='adminFunctions/updateQuantity.inc.php'>
                        <input type='hidden' name='tshirtID' value='" . $row['tshirtID'] . "'>
                        <input type = 'text' value='2' name = 'DBset' style='display:none';>
                        <button type='submit' style='background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;'>
                            Update
                        </button></form>
                </td>
            </tr>";
    }
    echo "</table>";
}

function loadPoloWear($conn)
{
    $sql = "SELECT * FROM polopcks";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Image</th>
                <th>T-shirt ID</th>
                <th>T-shirt Name</th>
                <th>T-shirt quantity</th>
                <th>Now Price</th>
                <th>Previous Price</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='uploadsNew/" . $row['tImage'] . "' alt='T-shirt Image' style='width:100px;height:auto;'></td>
                <td>" . $row['tshirtID'] . "</td>
                <td>" . $row['tName'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['tNowPrice'] . "</td>
                <td>" . $row['tThenPrice'] . "</td>
                <td>
                    <form method='post' action='adminFunctions/updateQuantity.inc.php'>
                        <input type='hidden' name='tshirtID' value='" . $row['tshirtID'] . "'>
                        <input type = 'text' value='3' name = 'DBset' style='display:none';>
                        <button type='submit' style='background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;'>
                            Update
                        </button></form>
                </td>
            </tr>";
    }
    echo "</table>";
}

function loadValuePacks($conn)
{
    $sql = "SELECT * FROM valuepcks";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Image</th>
                <th>T-shirt ID</th>
                <th>T-shirt Name</th>
                <th>T-shirt quantity</th>
                <th>Now Price</th>
                <th>Previous Price</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='uploadsNew/" . $row['tImage'] . "' alt='T-shirt Image' style='width:100px;height:auto;'></td>
               <td>" . $row['tshirtID'] . "</td>
                <td>" . $row['tName'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['tNowPrice'] . "</td>
                <td>" . $row['tThenPrice'] . "</td>
                <td>
                    <form method='post' action='adminFunctions/updateQuantity.inc.php'>
                        <input type='hidden' name='tshirtID' value='" . $row['tshirtID'] . "'>
                        <input type = 'text' value='4' name = 'DBset' style='display:none';>
                        <button type='submit' style='background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;'>
                            Update
                        </button></form>
                </td>
            </tr>";
    }
    echo "</table>";
}

function loadShortsWear($conn)
{
    $sql = "SELECT * FROM casualshorts";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Image</th>
                <th>T-shirt ID</th>
                <th>T-shirt Name</th>
                <th>T-shirt quantity</th>
                <th>Now Price</th>
                <th>Previous Price</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='uploadsNew/" . $row['tImage'] . "' alt='T-shirt Image' style='width:100px;height:auto;'></td>
                <td>" . $row['tshirtID'] . "</td>
                <td>" . $row['tName'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['tNowPrice'] . "</td>
                <td>" . $row['tThenPrice'] . "</td>
                <td>
                    <form method='post' action='adminFunctions/updateQuantity.inc.php'>
                        <input type='hidden' name='tshirtID' value='" . $row['tshirtID'] . "'>
                        <input type = 'text' value='5' name = 'DBset' style='display:none';>
                        <button type='submit' style='background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;'>
                            Update
                        </button></form>
                </td>
            </tr>";
    }
    echo "</table>";
}

function loadReturnInquire($conn)
{
    $sql = "SELECT * FROM customer_return";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Inquire ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Order No</th>
                <th>Required Service</th>
                <th>Message</th>
                <th>Document</th>
            </tr>";

    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['returnID'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['orderNo'] . "</td>
                <td>" . $row['service'] . "</td>
                <td>" . $row['message'] . "</td>
                <td><img src='customers/" . $row['document'] . "' alt='Document or image here' style='width:100px;height:auto;'></td>
            </tr>";
    }

    // Close the table tag
    echo "</table>";
}



function loadCustomerSupport($conn)
{
    $sql = "SELECT * FROM customer_return";
    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>Inquire ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Order No</th>
                <th>Required Service</th>
                <th>Message</th>
                <th>Document</th>
            </tr>";

    // Loop through each row and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['returnID'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['orderNo'] . "</td>
                <td>" . $row['service'] . "</td>
                <td>" . $row['message'] . "</td>
                <td><img src='customers/" . $row['document'] . "' alt='Document or image here' style='width:100px;height:auto;'></td>
            </tr>";
    }

    // Close the table tag
    echo "</table>";
}
