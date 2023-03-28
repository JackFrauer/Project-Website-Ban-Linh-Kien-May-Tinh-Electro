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
