<?php 

include 'connect.php';
$conn=MoKetNoi();
if ($conn->connect_error) {
    echo "Không kết nối được với MySQL";
}

mysqli_select_db($conn, "pc");
if(isset($_GET['action']) && $_GET['action'] == "delete-user"){
    $id=intval($_GET['id']);
    $sql="DELETE FROM user WHERE id=$id";
    $query=mysqli_query($conn,$sql);
    header("location:index.php");
}

if(isset($_GET['action']) && $_GET['action'] == "delete-order"){
    $id=intval($_GET['id']);
    $sql="DELETE FROM orders WHERE id=$id";
    $query=mysqli_query($conn,$sql);
    header("location:order.php");
  
}

if(isset($_GET['action']) && $_GET['action'] == "delete-product"){
    $id=intval($_GET['id']);
    $sql="DELETE FROM products WHERE id=$id";
    $query=mysqli_query($conn,$sql);
  header("location:table2.php");

}
?>