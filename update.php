<?php
        if (isset($_POST['submit'])) {
 
            foreach ($_POST['quantity'] as $key => $val) {
                if ($val <= 0) {
                    unset($_SESSION['cart'][$key]);
                } else {
                    $_SESSION['cart'][$key]['quantity'] = $val;
                }
            }
            header('location: cart2.php');
        }
?>




