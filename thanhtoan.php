<?php
include 'templates/header.php';
session_start();
error_reporting(0);
if (isset($_GET['action'])) {
    include 'connect.php';
    $conn = MoKetNoi();
    if ($conn->connect_error) {
        echo "Không kết nối được với MySQL";
    }
    mysqli_select_db($conn, "pc");
    $masanpham = '';
    $totalprice = 0;
    $totalquantity = 0;
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham = $value['id'];
        $sl = $value['quantity'];
        $price = $value['price'];
        $totalprice += $sl * $price;
        $totalquantity += $sl;
        $masanpham .= $id_sanpham . ' x ' . $sl . ', ';
    }
    $masanpham = rtrim($masanpham, ', ');

    $tenkhachhang = $_SESSION['TEN'];
    $createdate = date("Y-m-d", time());
    $sql = "INSERT INTO orders(TENKHACHHANG,MASANPHAM,THANHTIEN,createDATE,SOLUONG) VALUE('$tenkhachhang','$masanpham','$totalprice','$createdate','$totalquantity')";
    $result = mysqli_query($conn,$sql);
    unset($_SESSION['cart']);
    echo"<div class='notify__checkout'><p class='header__notify__checkout'>Thanh toán thành công! </p></br><p>Cám ơn bạn đã mua hàng của Electro, Chúng tôi sẽ giao hàng trong thời gian sớm nhất</p></br><a href='index.php' class='btn-back'>Tiếp tục mua hàng</a></div>";
}
?>