<?php
    session_start();
    if(isset($_POST['checkout'])){
        // Clear cart
        unset($_SESSION['cart']);
        // Show alert box
        echo '<script>alert("Cart cleared successfully!");</script>';
    }
?>