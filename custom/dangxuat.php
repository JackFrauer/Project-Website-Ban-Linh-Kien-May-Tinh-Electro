<?php
    session_start();
if (isset($_SESSION['txtNameLogin']))
{
 unset($_SESSION['txtNameLogin']);
}
header('Location: ontap.php');
?>