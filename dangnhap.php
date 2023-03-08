<?php
          
include 'templates/header.php';
?>

<body>


    <?php
    include 'templates/main-header.php';
    ?>



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
                    include 'connect.php';
                    $conn = MoKetNoi();
                    if ($conn->connect_error) {
                        echo "không kết nối được MySQL";
                    }
                    mysqli_select_db($conn, "pc");
                    if (isset($_POST["dangnhap"])) {
                        session_start();
                        $NameLogin = addslashes($_POST["txtNameLogin"]);
                        $password = addslashes($_POST["txtPassword"]);
                        
                        if (empty($NameLogin) || empty($password)) {
                            echo "Vui lòng điền thông tin";
                        } else {
                            $sqlLogin = "SELECT * FROM user WHERE username = '$NameLogin'";
                            $resultLogin = mysqli_query($conn, $sqlLogin) or die(mysqli_error($conn));
                            if (mysqli_num_rows($resultLogin) == 0) {
                                echo "Tên đăng nhập hoặc mật khẩu không đúng!";       
                            } else {
                                $row = mysqli_fetch_array($resultLogin);
                                if ($password != $row['password']) {
                                    echo "Mật khẩu không đúng. Vui lòng nhập lại";                                
                                } else {
                                    echo "Đăng nhập thành công, xin chào" . $NameLogin .'';
                                    $_SESSION['txtNameLogin'] = $NameLogin;
                                    $_SESSION['LOAINGUOIDUNG'] = $row['role'];
                                    header('Location: index.php');
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