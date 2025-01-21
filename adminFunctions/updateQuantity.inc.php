<?php
// Include your database configuration file
require_once("../dbConfig.php");

function generateForm($itemName, $tshirtID, $quantity, $tNowPrice, $tThenPrice, $dbUpdate)
{
    return "
        <form action='updateQuntityAndInsert.inc.php' method='post' style='padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; width: 300px; margin: auto;'>
            <label style='font-weight: bold;'>Item Name *</label><br>
            <input type='text' value='$itemName' readonly style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>
            
            <input type='hidden' value='$tshirtID' name='tshirtID'>
            
            <label style='font-weight: bold;'>Item Quantity *</label><br>
            <input type='number' value='$quantity' name='itemQuantity' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>
            
            <label style='font-weight: bold;'>Item Now Price *</label><br>
            <input type='text' value='$tNowPrice' name='itemNowPrice' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>
            
            <label style='font-weight: bold;'>Item Then Price *</label><br>
            <input type='text' value='$tThenPrice' name='itemThenPrice' style='width: 100%; margin-bottom: 10px; padding: 5px;'><br>
            
            <input type='hidden' value='$dbUpdate' name='DBupdate'>
            
            <button type='submit' name='Update' style='background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;'>Update</button>
        </form>
    ";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tshirtID = $_POST["tshirtID"];
    $DBset = $_POST["DBset"];
    $tableMap = [
        '1' => 'mensactivewear',
        '2' => 'menscrewneck',
        '3' => 'polopcks',
        '4' => 'valuepcks',
        '5' => 'casualshorts'
    ];

    if (array_key_exists($DBset, $tableMap)) {
        $tableName = $tableMap[$DBset];
        $sql = "SELECT * FROM $tableName WHERE tshirtID = '$tshirtID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $itemName = $row["tName"];
            $tNowPrice = $row["tNowPrice"];
            $tThenPrice = $row["tThenPrice"];
            $quantity = $row["quantity"];

            echo generateForm($itemName, $tshirtID, $quantity, $tNowPrice, $tThenPrice, $DBset);
        } else {
            echo "<p style='color: red; text-align: center;'>Item not found.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid category.</p>";
    }
}
$conn->close();
?>