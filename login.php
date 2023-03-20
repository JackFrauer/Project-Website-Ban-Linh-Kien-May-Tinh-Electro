<?php
include 'templates/header.php';
?>

<body>
    <?php
    include 'templates/main-header.php';
    ?>

<form name="frmDK" method="post" action="login-form.php">
<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Username" id="username" name="txtDNTen">
    <input type="password" value="" placeholder="Password" id="password" name="txtDNMK"> 
    <button type="summit" name="btnDangnhap" >Submit</button>
    <br>
    <br>
    <a href='register.php'>Đăng ký </a>
</div>
</form>

    <!-- FOOTER -->
    <?php
    include 'templates/footer.php';
    ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <?php
    include 'templates/Jquery.php';
    ?>

</body>

</html>