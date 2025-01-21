<?php
require_once("header.php");

require_once("dbConfig.php");

$tshirtID = $_POST["value"];

$sql = "SELECT * FROM menscrewneck";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $found = false;

    while ($row = $result->fetch_assoc()) {
        if ($tshirtID == $row["tshirtID"]) {

            $tName = $row["tName"];
            $tNowPrice = $row["tNowPrice"];
            $tThenPrice = $row["tThenPrice"];
            $tImage = $row["tImage"];
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "
        <script>
        alert('Invalid has Entered');
        </script>";
    }
}

echo "
<div class='sectionCat'>
    <h3>$tName</h3>
    <div class='logos'>
        <a href=''><img src='images/logos/icons8-facebook-48.png' alt=''></a>
        <a href=''><img src='images/logos/icons8-twitter-50.png' alt=''></a>
        <a href=''><img src='images/logos/icons8-whatsapp-48.png' alt=''></a>
        <a href=''><img src='images/logos/icons8-pinterest-48.png' alt=''></a>
    </div>
</div>
<hr>

<div class='sectionDet'>
    <img src='uploadsNew/$tImage' class='tImage'>
    <div class='detalsOfCloth'>
        <p style='color:red'>Now Price : RS $tNowPrice /=</p>
        <p style='text-decoration: line-through;'>RS $tThenPrice /=</p>
        <ul>
            <li>Product : $tName</li>
            <li>Brand : OXYGEN SPORTS</li>
            <li>Style : Crew Neck – Short Sleeve</li>
            <li>Colour : Neon Green & Jungle Green</li>
            <li>Material : Dri-Fit – 95% Polyester Microfiber, 5% Spandex</li>
            <li>Thickness : 150 – 160 GSM</li>
            <li>Size Range : XS – XXL</li>
            <li>Quality Standards : 100% QC Passed. Export Ready.</li>
            <li>Specialities : Lightweight, Moisture-Wicking, Wrinkle Free, Anti-Shrink, Quick-Dry Performance.</li>
            <li>Warranty : 14 Day Easy Returns & Size Exchanges. <a href='return.php'>Return & Exchange Policy</a></li>
            <li>Delivery : Estimated 1-3 Working Days within Colombo & Suburbs. 3-5 Working Days Outstation.</li>
            <li>Payment Options : Card or Cash on Delivery at Checkout.</li>
            <li>A Genuine Product. Made in Sri Lanka.</li>
        </ul>

        <form action='includes/addTocart.inc.php' method='POST' onsubmit='return validateForm()' class='buyForm'>
            <label for='size'>Select Size:</label>
            <select id='size' name='size'>
                <option value=''>--Select Size--</option>
                <option value='xs'>XS</option>
                <option value='s'>S</option>
                <option value='m'>M</option>
                <option value='l'>L</option>
                <option value='xl'>XL</option>
                <option value='xxl'>XXL</option>
            </select>
            <br><br>

            <label for='quantity'>Quantity:</label>
            <input type='number' id='quantity' name='quantity' min='1' value='1' required>
            <br><br>
            <input type='text' name = 'tshirtID' value = $tshirtID style='display:none'>
            <input type = 'text' value='2' name=forDB style = 'display:none'>
            <input type='submit' name='submit' value='Add to Cart'>
            <input type='submit' name='submit' value='Buy Now' formaction='includes/checkOut.inc.php'>
        </form>
    </div>
</div>

<div class='description'>
    <h3 class='descriptionHead'>- Description -</h3>
    <p>The $tName is made of high-performance moisture-wicking fabrics, fine durable stitches, and export-ready production standards to give you the best value, lightweight ease, and maximum comfort. The fit of the t-shirt falls between regular and slim. Relaxed on shoulders and neck, slightly slimmer yet comfortable on the body. A precise tailor-made fit to suit all body types. Crafted to emphasize muscle detail and form, this t-shirt ensures you look your best, whether hitting the gym or enjoying a relaxed outing.</p>

    <p>Our Dri-Fit t-shirts are versatile activewear suitable for various occasions. Wear them to casual outings, offering both comfort and style. They’re perfect for sports games, providing moisture-wicking technology that keeps you dry during intense matches. Ensure optimal comfort and performance when hitting the gym or engaging in workouts. Transition seamlessly from an exercise session to a casual hangout, thanks to their adaptable design. Whether it’s a jog in the park or a pick-up game with friends, Dri-Fit t-shirts excel in active settings. Embrace their functionality and fashionable appeal, making them an ideal choice for any athletic, casual, or sporty event.</p>

    <h3>Care Instructions</h3>
    <p>Wash at or below 30°C. Do not bleach or use detergents containing bleach. Tumble dry at low to medium temperature. Do not dry clean. Iron at medium temperature. Wash dark colours separately. We recommend turning the garment inside out during laundry and drying. Do not iron on prints.</p>

    <h3>Warranty</h3>
    <p>This product is eligible for a satisfaction money-back guarantee or exchange of sizes if required. Please read our Return & Exchange Policy for more information.</p>

    <h3>Payments & Delivery</h3>
    <p>We accept all major credit & debit cards, cash on delivery payments. The delivery fee is a flat-rate to any location in Sri Lanka and for any number of items you order. Deliveries will usually take 1-3 working days within Colombo and suburbs, 3-5 working days outstation. Deliveries are handled by third-party courier services. Delivery times mentioned may vary according to the scheduling of deliveries by the courier services.</p>
</div>
";

require_once("reviews.php");
require_once("footer.php");
?>