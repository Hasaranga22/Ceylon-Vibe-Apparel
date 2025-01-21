<?php

require_once("header.php");
?>

<div class="mainSection">
    <div class="sec">
        <h2>RETURN & EXCHANGE POLICY</h2>
        <p>
            We continuously strive to ensure that we provide all our customers with an amazing online shopping
            experience. If for any reason you are not satisfied with your purchase, you may request a refund or an
            exchange within 14 days from the date delivered. Please follow the instructions of our return & exchange
            policy below.
        </p>

        <h3>RETURN | EXCHANGE POLICY REQUIREMENTS</h3>
        <ul>
            <li>Items must be neatly packed and ready securely in the re-sealable package you received them in.
            </li>
            <li>The invoice should also be included inside the package.
            </li>
            <li>Items must not be worn, altered, damaged, or washed.
            </li>
            <li>Items must have all tags attached.
            </li>
            <li>Enter your details, choose your payment and shipping method, and click "Place Order." Once your
                order is confirmed, your order number will be displayed.</li>
        </ul>

        <h3>RETURN | EXCHANGE PROCEDURE</h3>
        <p>
            Please fill in and submit the Service Request Form on this page to initiate your request. We will contact
            you if further clarification is required.<br><br>

            In most cases, exchange requests will be dispatched within 2 working days depending on the stock
            availability. Returning items will be collected at the time of your new delivery. A collection & re-delivery
            charge of Rs.240/- may apply. Kindly note that this process will take 3-7 working days to be
            fulfilled.<br><br>

            Returning items for refund can either be collected via the same courier service at your request or you may
            use a reliable courier to send them back to us. Refunds will be processed after inspection of returned
            items. The total value of the order will be refunded except for delivery charges. Transfers can be made to
            any nominated bank by you. A notification with proof will be sent when the transfer is been made. This
            usually takes 2 working days upon receiving the returned package.<br><br>

            If any returns do not meet policy requirements, the items will be sent back to you immediately. We reserve
            the right to refuse a refund if the items have any signs of wear, alterations, misuse or damage.<br><br>

            For more information, please contact us on 011 7044979 (Lines are open from 9.00 AM – 5.00 PM Monday to
            Friday. 9.00 AM – 1.00 PM on Saturday) or email sales@tshirtrepublic.lk<br><br>

            We are pleased to serve you.
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