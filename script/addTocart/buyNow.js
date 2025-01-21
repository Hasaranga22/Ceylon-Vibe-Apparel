// Redirect to cart.php when "Add to Cart" is clicked
document.getElementById('addCart').addEventListener('click', function () {
    window.location.href = 'cart.php';
});

// Redirect to buy.php when "Buy Now" is clicked
document.getElementById('buyItem').addEventListener('click', function () {
    window.location.href = 'buy.php';
});