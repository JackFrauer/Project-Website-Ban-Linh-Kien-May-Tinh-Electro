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



        $DNTen = $_POST['txtDNTen'];
        $DNMK = $_POST['txtDNMK'];

        $kt = 1;
        if (empty($DNTen) || empty($DNMK)) {
            echo "<p> Yêu cầu ghi đầy đủ Tài khoản hoăc mật khẩu </p>";
            $kt = 0;
        }

        // prepare and bind statement
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
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
            // Username not found
            $kt = 0;
        } else {
            // fetch row
            $row = $result->fetch_assoc();
            // verify password
            if (!password_verify($DNMK, $row['password'])) {
                // Password incorrect
                $kt = 0;
            } else {
                // set session variables
                $_SESSION['TENDANGNHAP'] = $DNTen;
                $_SESSION['TEN'] = $row['fullname'];
                $_SESSION['role'] = $row['role'];
            }
        }

        if ($kt == 1) {
            //send to index using javascript
            echo "<script>window.location.href='index.php';</script>";
        }
        //alert login failed
        else {
            echo "<script>alert('Sai tên người dùng hoặc mật khẩu');</script>";
        }
    }
    ?>


    <form name="frmDK" method="post" action="login.php">
        <div class="logo"></div>
        <div class="login-block">
            <h1>Login</h1>
            <input type="text" value="" placeholder="Username" id="username" name="txtDNTen">
            <input type="password" value="" placeholder="Password" id="password" name="txtDNMK">
            <button type="summit" name="btnDangnhap">Submit</button>
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