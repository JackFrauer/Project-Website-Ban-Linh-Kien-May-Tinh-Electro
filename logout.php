<?php
    session_start();
if (isset($_SESSION['TENDANGNHAP']))
{
 unset($_SESSION['TENDANGNHAP']);
}
header('Location: index.php');
?>