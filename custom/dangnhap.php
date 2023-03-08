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
            <li class="C-navbar__items"><a href="dangky.php" class="C-navbar__items__link">Đăng ký</a></li>

        </ul>
    </div>



    <form action="dangnhap.php" method="post">
        <div id="FormLogin" class="form__login">
            <div class="header__login">
                <i class="fa-solid fa-lock"></i>
                ĐĂNG NHẬP
            </div>
            <div class="midle__login">
                <div class="list__login">
                    <div class="title__login">Tên Đăng Nhập: </div>
                    <input name="txtNameLogin" type="text" class="input__login"
                        placeholder="nhập tên đăng nhập">
                </div>
                <div class="list__login">
                    <div class="title__login">Password: </div>
                    <input name="txtPassword" id="password" type="password" class="input__login" placeholder="Mật khẩu">
                    <i onclick="ShowPass();" class="fa-solid fa-eye eyePass"></i>
                </div>
                <span class="warningLogin">
                    <?php
                    
                    error_reporting(0);
                    include 'Vidu_ketnoi.php';
                    $conn = MoKetNoi();
                    if ($conn->connect_error) {
                        echo "không kết nối được MySQL";
                    }
                    mysqli_select_db($conn, "BAI12_1");
                    if (isset($_POST["dangnhap"])) {
                        session_start();
                        $NameLogin = addslashes($_POST["txtNameLogin"]);
                        $password = addslashes($_POST["txtPassword"]);
                        
                        if (empty($NameLogin) || empty($password)) {
                            echo "Vui lòng điền thông tin";
                        } else {
                            $sqlLogin = "SELECT * FROM nguoidung WHERE TENDANGNHAP = '$NameLogin'";
                            $resultLogin = mysqli_query($conn, $sqlLogin) or die(mysqli_error($conn));
                            if (mysqli_num_rows($resultLogin) == 0) {
                                echo "Tên đăng nhập hoặc mật khẩu không đúng!";       
                            } else {
                                $row = mysqli_fetch_array($resultLogin);
                                if ($password != $row['MATKHAU']) {
                                    echo "Mật khẩu không đúng. Vui lòng nhập lại";                                
                                } else {
                                    echo "Đăng nhập thành công, xin chào" . $NameLogin .'';
                                    $_SESSION['txtNameLogin'] = $NameLogin;
                                    $_SESSION['LOAINGUOIDUNG'] = $row['LOAINGUOIDUNG'];
                                    header('Location: ontap.php');
                                }
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
                    <input type="submit" name="dangnhap" id="btn__register" value="Đăng nhập">
                    <button>Quên mật khẩu</button>
                </div>
            </div>
            <div class="footer__login">
                <p class="footer__login__title">Bạn chưa có tài khoản?</p>
                <a class="signUp__link" href="dangky.php">Đăng ký</a>
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