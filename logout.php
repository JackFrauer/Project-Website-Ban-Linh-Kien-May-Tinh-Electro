<?php
    session_start();
if (isset($_SESSION['TENDANGNHAP']))
{
 unset($_SESSION['TENDANGNHAP']);
 unset($_SESSION['cart']);
}
header('Location: index.php');
?>