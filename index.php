<?php
include_once 'header.php';
?>

<div class="slideshow-container">
    <img src="images/slide5.jpg" style="width:100%" class="slides">
    <img src="images/slide2.jpg" style="width:100%" class="slides">
    <img src="images/slide3.jpg" style="width:100%" class="slides">
    <img src="images/slide4.jpg" style="width:100%" class="slides">
    <img src="images/slide1.jpg" style="width:100%" class="slides">

    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
</div>

<div class="dots">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
</div>


<div class="websiteDescribe">
    <div class="div1">
        <i class="fa-regular fa-star"></i>
        <h3>Genuine Products</h3>
        <p>Shop online with confidence. Thousands of reviews.</p>
    </div>
    <div class="div2">
        <i class="fa-regular fa-comments"></i>
        <h3>14 Day Exchanges</h3>
        <p>Size does not fit? Just let us know. We'll do the needful.</p>
    </div>
    <div class="div3">
        <i class="fa-solid fa-rotate-left"></i>
        <h3>Hassle Free Returns</h3>
        <p>Buy now, worry-free, with our easy return process.</p>
    </div>
    <div class="div4">
        <i class="fa-regular fa-credit-card"></i>
        <h3>Cash on Delivery</h3>
        <p>Secure card payments at checkout or cash on delivery.</p>
    </div>
</div>

<h2 class="customerUploadsHead">Repost on instagram</h2>
<div class="customerUploads">
    <img src="images/customerUploads/upload1.jpg" alt="">
    <img src="images/customerUploads/upload2.jpg" alt="">
    <img src="images/customerUploads/upload3.jpg" alt="">
    <img src="images/customerUploads/upload4.jpg" alt="">
    <img src="images/customerUploads/upload5.jpg" alt="">
</div>


<h2 class="mensWearHead">Men's Activewear & Sportswear</h2>
<hr>

<table class="mensActiveWearCollection">
    <?php
    require_once "dbConfig.php";

    $sql = "SELECT * from mensactivewear";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0; // To keep track of the product count
        echo "<tr>"; // Start the first row
    
        while ($row = $result->fetch_assoc()) {
            $tshirtID = $row["tshirtID"];
            $tName = $row["tName"];
            $tNPrice = $row["tNowPrice"];
            $tTprice = $row["tThenPrice"];
            $tImage = $row["tImage"];

            echo "
            <td class='inner_collection'>
                <img src='uploadsNew/$tImage' alt='Image Not Found'><br>
                <h3>$tName</h3>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i><br>
                <span class='price-new'>RS : $tNPrice</span><br>
                <span class='price-total'>RS : $tTprice</span>
                <form action='clothsDetails.php' method='post'>
                    <input type = 'text' value ='$tshirtID' name = value  style ='display:none;'>
                    <input type='submit' name = 'submit' id='buyButton'value='Buy Now'>
                </form>
            </td>
            ";

            $count++;
            // After every 4th product, close the current row and start a new one
            if ($count % 4 == 0) {
                echo "</tr><tr>";
            }
        }

        echo "</tr>"; // Close the last row
    }
    ?>
</table>



<h2 class="mensWearHead">Men's Crew Neck T-Shirts</h2>
<hr>
<table class="mensActiveWearCollection">
    <?php
    require_once "dbConfig.php";
    $sql = "SELECT * from menscrewneck";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0; // To keep track of the product count
        echo "<tr>"; // Start the first row
    
        while ($row = $result->fetch_assoc()) {
            $tshirtID = $row["tshirtID"];
            $tName = $row["tName"];
            $tNPrice = $row["tNowPrice"];
            $tTprice = $row["tThenPrice"];
            $tImage = $row["tImage"];

            echo "
            <td class='inner_collection'>
                <img src='uploadsNew/$tImage' alt='Image Not Found'><br>
                <h3>$tName</h3>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i><br>
                <span class='price-new'>RS : $tNPrice</span><br>
                <span class='price-total'>RS : $tTprice</span>
                <form action='crewNeckDetails.php' method='post'>
                    <input type = 'text' value ='$tshirtID' name = value  style ='display:none;'>
                    <input type='submit' name = 'submit' id='buyButton' value='Buy Now'>
                </form>
            </td>
            ";

            $count++;
            // After every 4th product, close the current row and start a new one
            if ($count % 4 == 0) {
                echo "</tr><tr>";
            }
        }

        echo "</tr>"; // Close the last row
    }
    ?>
</table>








<h2 class="mensWearHead">Men's Polo T-Shirts</h2>
<hr>
<table class="mensActiveWearCollection">
    <?php
    require_once "dbConfig.php";

    $sql = "SELECT * from polopcks";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0; // To keep track of the product count
        echo "<tr>"; // Start the first row
    
        while ($row = $result->fetch_assoc()) {
            $tshirtID = $row["tshirtID"];
            $tName = $row["tName"];
            $tNPrice = $row["tNowPrice"];
            $tTprice = $row["tThenPrice"];
            $tImage = $row["tImage"];

            echo "
            <td class='inner_collection'>
                <img src='uploadsNew/$tImage' alt='Image Not Found'><br>
                <h3>$tName</h3>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i><br>
                <span class='price-new'>RS : $tNPrice</span><br>
                <span class='price-total'>RS : $tTprice</span>
                <form action='poloDetails.php' method='post'>
                    <input type = 'text' value ='$tshirtID' name = value  style ='display:none;'>
                    <input type='submit' name = 'submit' id='buyButton'value='Buy Now'>
                </form>
            </td>";

            $count++;
            // After every 4th product, close the current row and start a new one
            if ($count % 4 == 0) {
                echo "</tr><tr>";
            }
        }

        echo "</tr>"; // Close the last row
    }
    ?>
</table>








<h2 class="mensWearHead">Value Packs | Men's Crew Neck T-Shirts</h2>
<hr>
<table class="mensActiveWearCollection">
    <?php
    require_once "dbConfig.php";

    $sql = "SELECT * from valuepcks";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0; // To keep track of the product count
        echo "<tr>"; // Start the first row
    
        while ($row = $result->fetch_assoc()) {
            $tshirtID = $row["tshirtID"];
            $tName = $row["tName"];
            $tNPrice = $row["tNowPrice"];
            $tTprice = $row["tThenPrice"];
            $tImage = $row["tImage"];

            echo "
            <td class='inner_collection'>
                <img src='uploadsNew/$tImage' alt='Image Not Found'><br>
                <h3>$tName</h3>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i><br>
                <span class='price-new'>RS : $tNPrice</span><br>
                <span class='price-total'>RS : $tTprice</span>
                <form action='valuePackscrewNeckDetails.php' method='post'>
                    <input type = 'text' value ='$tshirtID' name = value  style ='display:none;'>
                   <input type='submit' name = 'submit' id='buyButton'value='Buy Now'>
                </form>
            </td>
            ";

            $count++;
            // After every 4th product, close the current row and start a new one
            if ($count % 4 == 0) {
                echo "</tr><tr>";
            }
        }

        echo "</tr>"; // Close the last row
    }
    ?>
</table>





<h2 class="mensWearHead">Men's Casual Shorts</h2>
<hr>
<table class="mensActiveWearCollection">
    <?php

    require_once "dbConfig.php";

    $sql = "SELECT * from casualshorts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0; // To keep track of the product count
        echo "<tr>"; // Start the first row
    
        while ($row = $result->fetch_assoc()) {
            $tshirtID = $row["tshirtID"];
            $tName = $row["tName"];
            $tNPrice = $row["tNowPrice"];
            $tTprice = $row["tThenPrice"];
            $tImage = $row["tImage"];

            echo "
            <td class='inner_collection'>
                <img src='uploadsNew/$tImage' alt='Image Not Found'><br>
                <h3>$tName</h3>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i><br>
                <span class='price-new'>RS : $tNPrice</span><br>
                <span class='price-total'>RS : $tTprice</span>
                <form action='casualShortDetails.php' method='post'>
                    <input type = 'text' value ='$tshirtID' name = value  style ='display:none;'>
                    <input type='submit' name = 'submit' id='buyButton'value='Buy Now'>
                </form>
            </td>
            ";

            $count++;
            // After every 4th product, close the current row and start a new one
            if ($count % 4 == 0) {
                echo "</tr><tr>";
            }
        }

        echo "</tr>"; // Close the last row
    }
    ?>
</table>

<?php
include_once 'reviews.php';
?>

<?php
include_once 'footer.php';
?>