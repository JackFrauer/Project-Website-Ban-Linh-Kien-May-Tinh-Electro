<?php
include 'templates/header.php';
?>

<body>


    <?php
    include 'templates/main-header.php';
    ?>



    <?php
    $DNTen = "";
    $DNMK = "";
    if (isset($_POST["btnDangnhap"])) {
        session_start();
        include 'connect.php';
        $conn = MoKetNoi();
        if ($conn->connect_error) {
            echo "<p> Không kết nối được MySQL </p>";
        }
        mysqli_select_db($conn, "pc");
        $DNTen = $_POST['txtDNTen'];
        $DNMK = $_POST['txtDNMK'];

        $kt = 1;
        if (empty($DNTen) || empty($DNMK)) {
            echo "<p> Yêu cầu ghi đầy đủ Tài khoản hoăc mật khẩu </p>";
            $kt = 0;
        }

        // prepare and bind statement
        $stmt = $conn->prepare("SELECT username,password,role FROM user WHERE username=?");
        $stmt->bind_param("s", $DNTen);

        // execute statement
        $stmt->execute();

        // get result
        $result = $stmt->get_result();

        // close statement and connection
        $stmt->close();
        $conn->close();

        // check result
        if ($result->num_rows == 0) {
            echo "<p> Tên đăng nhập không tồn tại hoặc không đúng </p>";
            $kt = 0;
        } else {
            // fetch row
            $row = $result->fetch_assoc();
            if ($DNMK != $row['password']) {
                echo "<p> mật khẩu không đúng </p>";
                $kt = 0;
            } else {
                // set session variables
                $_SESSION['username'] = $DNTen;
                $_SESSION['role'] = $row['role'];
            }
        }

        if ($kt == 1) {
            header('Location: index.php');
        }
    }
    ?>




    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="px-5 ms-xl-4">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0">Logo</span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form method="post" action="dangky.php" style="width: 23rem;">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            <div class="form-outline mb-4">
                                <input type="text" name="txtDNTen" id="form2Example18" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example18">Tên đăng nhập</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example28" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example28" name="txtDNMK">Mật khẩu</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" name="btnDangnhap" type="submit">Login</button>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>





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