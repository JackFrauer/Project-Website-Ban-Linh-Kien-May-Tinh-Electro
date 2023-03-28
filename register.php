<?php
include 'templates/header.php';
?>
<body>
    <?php
    include 'templates/main-header.php';
    ?>
<form name="frmDK" method="post" action="register.php">
<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Username*" id="username" name="txtDNTen" required>
    <input type="text" value="" placeholder="Name*" id="username" name="txtHoten"required>
    <input type="email" value="" placeholder="Email*" id="username" name="txtEmail"required>
    <input type="tel" value="" placeholder="Phone" id="username" name="txtSDT">
    <input type="text" value="" placeholder="Address" id="username" name="txtDC">
    <input type="password" value="" placeholder="Password*" id="password" name="txtDNMK"required> 
    <input type="password" value="" placeholder="Password*" id="password" name="txtDNMKre"required> 
    <button type="summit" name="btnDangky"> Đăng ký</button>
</div>
</form>

<?php
$DNTen = "";
$DNMK = "";
$DNMKre = "";
$DNMK_hash = ""; // initialize hashed password variables
$DNMKre_hash = "";
$Hoten = "";
$Email = "";
$SDT = "";
$DC = "";
$role = "user";
if (isset($_POST["btnDangky"])) {
    $conn = MoKetNoi();
    if ($conn->connect_error) {
        echo "<p> Không kết nối được MySQL </p>";
    }
    mysqli_select_db($conn, "pc");
    $DNTen = $_POST['txtDNTen'];
    $DNMK = $_POST['txtDNMK'];
    $DNMKre = $_POST['txtDNMKre'];
    $Hoten = $_POST['txtHoten'];
    $Email = $_POST['txtEmail'];
    $SDT = $_POST['txtSDT'];
    $DC = $_POST['txtDC'];
    $user = 'user';
    $kt = 1;
    //register
    $kt = 1;
    if ($DNMK != $DNMKre) {
        echo "<script>alert('Nhập mật khẩu chưa trùng khớp');</script>";
        $kt = 0;
    } else {
        $DNMK_hash = password_hash($DNMK, PASSWORD_DEFAULT); // hash original password
        $DNMKre_hash = password_hash($DNMKre, PASSWORD_DEFAULT); // hash retyped password
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM user WHERE email='$Email'")) > 0) {
        echo "<script>alert('Email đã được dùng');</script>";
        $kt = 0;
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT username FROM user WHERE username='$DNTen'")) > 0) {
        echo "<script>alert('Tên đăng nhập đã có người dùng vui lòng chọn tên khác');</script>";
        $kt = 0;
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT phone FROM user WHERE phone='$SDT'")) > 0) {
        echo "<script>alert('số điện thoại đã được dùng');</script>";
        $kt = 0;
    }
    if ($kt == 1) {
        $nguoidung = "INSERT INTO user(username,password,fullname,address,phone,email,role)
        VALUES('$DNTen','$DNMK_hash','$Hoten','$DC','$SDT','$Email','$user')";
        $results = mysqli_query($conn, $nguoidung) or die(mysqli_error($conn));

        echo "<script>alert('Bạn đã đăng ký thành công hãy đăng nhập hoặc quay lại trang chủ');</script>";
        header('Location: login.php');
    }
}
?>


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