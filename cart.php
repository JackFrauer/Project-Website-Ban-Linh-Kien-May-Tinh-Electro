<?php
    session_start();
    include 'connect.php';
    $conn=MoKetNoi();
    if ($conn->connect_error) {
        echo "Không kết nối được với MySQL";
    }
    mysqli_select_db($conn, "pc");


    if (isset($_GET['action']) && $_GET['action'] == "add") {

        $id = intval($_GET['id']);

        if (isset($_SESSION['cart'][$id])) {

            $_SESSION['cart'][$id]['quantity']++;
        } else {

            $sql_s = "SELECT * FROM products
				WHERE id={$id}";
            $query_s = mysqli_query($conn, $sql_s);
            if (mysqli_num_rows($query_s) != 0) {
                $row_s = mysqli_fetch_array($query_s);

                $_SESSION['cart'][$row_s['id']] = array(
                    "quantity" => 1,
                    "price" => $row_s['price']
                );
            } else {

                $message = "This product id it's invalid!";
            }
        }
        header('location: giohang.php');
    }
 
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    
        $id = intval($_GET['id']);
    
        if (isset($_SESSION['cart'][$id])) {
    
            unset($_SESSION['cart'][$id]);
        } else {
    
            $message = "This product id it's invalid!";
        }
        header('location: giohang.php');
    }
    

    if (isset($_POST['submit'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
        header('location: giohang.php');
    }

//product details



 


?>