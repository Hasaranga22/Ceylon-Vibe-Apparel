<?php

require_once("header.php");
?>

<div class="mainSection">
    <div class="sec">
        <h2>Frequently Asked Questions</h2>

        <h3>How is the product quality?</h3>
        <p>
            All our garments are crafted using high-quality materials, durable stitching, and export-ready
            production
            standards to ensure the best value and comfort. They are tagless, with a neat printed label that
            includes a
            handy laundry guide. We pay meticulous attention to fabric, fit, and detailing for each garment,
            ensuring a
            superior experience. We’re confident you’ll love our t-shirts!
        </p>

        <h3>How do I place an order?</h3>
        <ul>
            <li>Click on the image of your desired product to visit the product page.</li>
            <li>Select your preferred size. Size guides are available on every product page for your convenience.
            </li>
            <li>Choose to continue shopping or view your cart after adding the product to your selection.</li>
            <li>Proceed to checkout from the cart page.</li>
            <li>Enter your details, choose your payment and shipping method, and click "Place Order." Once your
                order is confirmed, your order number will be displayed.</li>
        </ul>

        <h3>What are the payment options available?</h3>
        <p>
            We accept all major credit and debit cards, bank transfers, and cash on delivery.
        </p>

        <h3>How do I choose the right size for me?</h3>
        <p>
            A size chart and three additional sizing methods are available on each product page. We strongly
            recommend using these guides to find the best-fitting size.
        </p>

        <h3>What if I have ordered the wrong size?</h3>
        <p>
            Delivery fees are Rs.240/- island-wide, regardless of your location or the number of items ordered.
            <br><br>
            Note: Deliveries are managed by third-party courier services. Delivery times may vary depending on stock
            availability and courier schedules.
        </p>

        <h3>How do I cancel my order?</h3>
        <p>
            You can cancel your order by submitting a request using the Service Request Form on our Returns and
            Exchanges page. Alternatively, you can contact us at 011 7044979
            (available 9:00 AM–5:00 PM Monday to Friday, and 9:00 AM–1:00 PM on Saturday) or email
            sales@tshirtrepublic.lk to initiate your request.
        </p>

        <h3>How secure is your website?</h3>
        <p>
            Our website is hosted in a world-class hosting environment, and we take all necessary precautions to
            ensure your information remains 100% secure. We do not sell, share, or distribute any of your contact or
            sensitive information. For more details, please refer to our Privacy Policy.
        </p>
    </div>


    <div class="sec" id="secForm">
        <h2>Service Request Form</h2>
        <form action="includes/returnSupport.inc.php" method="post" enctype="multipart/form-data">
            <label for="name">Your Name *</label><br>
            <input type="text" name="name" id="name" required><br>

            <label for="contact">Contact Number *</label><br>
            <input type="tel" name="contact" id="contact" required><br>

            <label for="email">Your Email *</label><br>
            <input type="email" name="email" id="email" required><br>

            <label for="order-number">Order Number *</label><br>
            <input type="text" name="order_number" id="order-number" required><br>

            <label for="service">Required Service *</label><br>
            <select name="service" id="service" required>
                <option value="size_exchange">Size Exchange</option>
                <option value="color_exchange">Color Exchange</option>
                <option value="other_exchange">Other Exchange</option>
                <option value="cancel_order">Cancel Order</option>
                <option value="return_refund">Return And Refund</option>
                <option value="information">Information</option>
            </select><br>

            <label for="message">Your Message *</label><br>
            <textarea name="message" id="message" rows="5" required></textarea><br>

            <label for="message">Attach file if you need *</label>
            <input type="file" name="image" id="image">

            <button type="submit">Submit</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function (event) {
        // Get form values
        const name = document.getElementById('name').value;
        const contact = document.getElementById('contact').value;
        const email = document.getElementById('email').value;
        const orderNumber = document.getElementById('order-number').value;
        const service = document.getElementById('service').value;
        const message = document.getElementById('message').value;

        // Regular expression for email validation
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        // Validate name
        if (name.trim() === "") {
            alert("Please enter your name.");
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validate contact number (basic validation for 10 digits)
        if (!/^\d{10}$/.test(contact)) {
            alert("Please enter a valid 10-digit contact number.");
            event.preventDefault();
            return;
        }

        // Validate email
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            event.preventDefault();
            return;
        }

        // Validate order number
        if (orderNumber.trim() === "") {
            alert("Please enter your order number.");
            event.preventDefault();
            return;
        }

        // Validate service selection
        if (service === "") {
            alert("Please select the required service.");
            event.preventDefault();
            return;
        }

        // Validate message
        if (message.trim() === "") {
            alert("Please enter your message.");
            event.preventDefault();
            return;
        }

        // If all validations pass, form will be submitted
    });
</script>

<?php

require_once("footer.php");
?>