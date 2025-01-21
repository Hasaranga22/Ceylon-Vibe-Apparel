document.addEventListener("DOMContentLoaded", () => {
    const checkoutForm = document.getElementById("checkoutForm");
    const checkoutButton = document.querySelector('form[action="checkout.php"] button[type="submit"]');

    // Attach an event listener to the checkout button
    checkoutButton.addEventListener("click", (event) => {
        // Check if the form is valid
        if (!checkoutForm.checkValidity()) {
            event.preventDefault(); // Prevent form submission
            alert("Please fill out all required fields in the form before proceeding to checkout.");
        } else {
            // Prevent form submission to show alert
            event.preventDefault();
            alert("Order placed successfully!");
            // Optionally submit the form programmatically
            checkoutForm.submit();
        }
    });
});
