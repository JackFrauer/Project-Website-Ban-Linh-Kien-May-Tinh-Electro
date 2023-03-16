

<style>

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 50px auto 50px auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
    padding: 0 20px;
    margin-top: 20px;
}

.login-block button:hover {
    background: #ff7b81;
}

</style>






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
            $_SESSION['TENDANGNHAP'] = $DNTen;
            $_SESSION['TEN'] = $row['fullname'];
            $_SESSION['role'] = $row['role'];
        }
    }

    if ($kt == 1) {
        header('Location: index.php');
    }
}


?>








<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<form name="frmDK" method="post" action="login.php">
<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Username" id="username" name="txtDNTen">
    <input type="password" value="" placeholder="Password" id="password" name="txtDNMK"> 
    <button type="summit" name="btnDangnhap" >Submit</button>
    <button> Đăng ký</button>
</div>
</form>


