function clearCart() {
    // Clear the cart using AJAX
    $.ajax({
        url: 'thanhtoan.php',
        success: function() {
            // Show an alert box
        }
    });
}