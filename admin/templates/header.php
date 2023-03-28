<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Electro Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        function confirmDelete(orderId, orderId1) {
            var confirmed = confirm("Bạn có chắc chắn muốn xóa sản phẩm #" + orderId1 + " không?");
            if (confirmed) {
                window.location.href = "delete.php?action=delete-product&id=" + orderId;
            }
        }
        function confirmDeleteUser(orderId, orderId1) {
            var confirmed = confirm("Bạn có chắc chắn muốn xóa người dùng #" + orderId1 + " không?");
            if (confirmed) {
                window.location.href = "delete.php?action=delete-user&id=" + orderId;
            }
        }
        function confirmDeleteOrder(orderId, orderId1) {
            var confirmed = confirm("Bạn có chắc chắn muốn xóa đơn hàng #" + orderId1 + " không?");
            if (confirmed) {
                window.location.href = "delete.php?action=delete-order&id=" + orderId;
            }
        }

    </script>


    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>