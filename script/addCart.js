function validateForm() {
    const size = document.getElementById('size').value;

    if (size === '') {
        alert('Please select a size before adding to the cart.');
        return false;
    }

    return true;
}