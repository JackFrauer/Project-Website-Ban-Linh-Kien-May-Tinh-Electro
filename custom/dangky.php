<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ontap.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Dangnhap.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ontap</title>
</head>
<header>
    <img src="logohiast.jpg" alt="" class="header__logo">
    <div class="header__title">THƯ VIỆN ĐIỆN TỬ TRƯỜNG CAO ĐẲNG KINH TẾ CÔNG NGHỆ</div>

</header>

<body>
    <div class="contain__navbar">
        <ul class="C-navbar__list">
            <li class="C-navbar__items"><a href="ontap.php" class="C-navbar__items__link">Trang chủ</a></li>
            <li class="C-navbar__items curriculumMenu ">
                <a href="ontap.php" class=" C-navbar__items__link">Giáo trình</a>
                <div class="curriculumMenu-item">
                    <a href="" class="curriculumMenu-link">Giáo trình 1</a>
                    <a href="" class="curriculumMenu-link">Giáo trình 2</a>
                    <a href="" class="curriculumMenu-link">Giáo trình 3</a>
                </div>
            </li>
            <li class="C-navbar__items"><a href="chuyennganh.php" class="C-navbar__items__link">Chuyên ngành</a></li>
            <li class="C-navbar__items"><a href="tracuu.php" class="C-navbar__items__link">Tra cứu Sách</a></li>
            <li class="C-navbar__items"><a href="" class="C-navbar__items__link">Sách tham khảo</a></li>
            <li class="C-navbar__items"><a href="dangnhap.php" class="C-navbar__items__link">Đăng nhập</a></li>
        </ul>
    </div>

    <form action="dangky.php" method="post">
        <div id="FormDegister" class="form__degister">
            <div class="header__login">
                <i class="fa-solid fa-lock"></i>
                ĐĂNG KÝ
            </div>
            <div class="midle__login">
                <div class="list__login">
                    <div class="title__login">Tên đăng nhập: </div>
                    <input name="txtNameLogin"  type="text" class="input__login" >
                </div>
                
                <div class="list__login">
                    <div class="title__login">Password: </div>
                    <input name="txtPass" id="password" type="password" class="input__login" >
                    <i class="fa-solid fa-eye eyePass" onclick="ShowPass();"></i>
                </div>
                <div class="list__login">
                    <div class="title__login">Nhập lại Password: </div>
                    <input name="txtRPass"  type="password" class="input__login" >
                </div>
                <div class="list__login">
                    <div class="title__login">Họ tên: </div>
                    <input name="txtName"  type="text" class="input__login" >
                </div>
                <div class="list__login">
                    <div class="title__login">Địa chỉ: </div>
                    <input name="txtAddress"  type="text" class="input__login" >
                </div>
                <div class="list__login">
                    <div class="title__login">Số điện thoại: </div>
                    <input name="txtPhone"  type="text" class="input__login" >
                </div>
                <div class="list__login">
                    <div class="title__login">Email: </div>
                    <input name="txtEmail" id="email" type="text" class="input__login"
                        >
                </div>
                <span class="warningLogin">
                    <?php
                    include 'Vidu_ketnoi.php';
                    $conn = MoKetNoi();
                    if ($conn->connect_error) {
                        echo "không kết nối được MySQL";
                    }
                    mysqli_select_db($conn, "BAI12_1");
                    if (isset($_POST["dangky"])) {
                        $nameLogin = $_POST['txtNameLogin'];
                        $Pass = $_POST['txtPass'];
                        $RPass = $_POST['txtRPass'];
                        $Name = $_POST['txtName'];
                        $Address = $_POST['txtAddress'];
                        $phone = $_POST['txtPhone'];
                        $email = $_POST['txtEmail'];
                        
                        
                        if (empty($email) || empty($Pass) || empty($RPass) || empty($nameLogin) || empty($Name) || empty($Address) || empty($phone) ){
                            echo "Vui lòng điền đẩy đủ thông tin";
                        } else {
                            $checkInfor = "SELECT * FROM nguoidung WHERE TENDANGNHAP = '$nameLogin'";
                            $results = mysqli_query($conn, $checkInfor);
                            if (mysqli_num_rows($results) > 0) {
                                echo "Tên đăng nhập đã được dùng!";
                            } else {
                                $sql = "INSERT INTO nguoidung (TENDANGNHAP,MATKHAU,HOTEN,DIACHI,SODTH,EMAIL,LOAINGUOIDUNG) values ('{$nameLogin}','{$Pass}','{$Name}','{$Address}','{$phone}','{$email}','user')";
                                $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                echo '<script language="javascript">alert("Đăng ký thành công");</script>'  ;
                            }
                        }
                    }
                    DongKetNoi($conn);

                    ?>
                </span>
                <div class="saveInformation">
                    <i class="fa-solid fa-square"></i>
                    Nhớ thông tin
                </div>
                <div class="button">
                    <input type="submit" name="dangky" id="btn__register" value="Đăng ký">
                </div>
            </div>
            <div class="footer__login">
                <p class="footer__login__title">Bạn đã có tài khoản?</p>
                <a class="signUp__link" href="dangnhap.php">Đăng nhập</a>
            </div>
        </div>
    </form>
</body>
<footer>
    <div class="footer__contact">
        <ul class="footer__contact__list">
            <li class="footer__contact__items"><a href="" class="contact__link">Liên hệ: </a></li>
            <li class="footer__contact__items"><a href="" class="contact__link">Địa chỉ: 123 ABC, P10, Q.Thủ Đức,
                    Tp.HCM</a></li>
            <li class="footer__contact__items"><a href="" class="contact__link">Điện thoại: 023456789</a></li>
            <li class="footer__contact__items"><a href="" class="contact__link">Email: abc@gmail.com</a></li>
        </ul>
    </div>
    <div class="footer__license">Bản quyền</div>
    <div class="footer__rules">
        <ul class="footer__contact__list">
            <li class="footer__contact__items"><a href="" class="contact__link">Quy định sử dụng tài khoản </a></li>
            <li class="footer__contact__items"><a href="" class="contact__link">Quy định tải tài liệu</a></li>
        </ul>
    </div>
</footer>
<script src="ontap.js"></script>       
</html>