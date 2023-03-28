<?php
include 'templates/header.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '/xampp/htdocs/electro-master/admin/templates/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include 'templates/nav.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Bảng quản lý sản phẩm</h1>
                    <p class="mb-4">Từ đây admin có thể chỉnh thông tin sản phẩm cũng như có thể thêm và xóa các sản phẩm khác nhau. <a target="_blank" href="https://github.com/JackFrauer/Website-De-An-Electro.git">Trang github của chúng tôi</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm</h6>
                        </div>
                        <div class="card-body">
            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Mã sản phẩm</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Thương hiệu</th>
                                            <th>Giá</th>
                                            <th>Giới thiệu sản phẩm</th>

                                            <th>Ảnh</th>
                                            <th>Ảnh nhiều</th>

                                            <th>Năm sản xuất</th>
                                            <th>Số lượng</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php


                                        include 'connect.php';
                                        $conn = MoKetNoi();
                                        if ($conn->connect_error) {
                                            echo "Không kết nối được với MySQL";
                                        }
                                        mysqli_select_db($conn, "pc");
                                        $sql = "SELECT p.id, p.product_name, p.product_id, p.product_type, m.manufacturer_name, p.price, p.product_details, p.image, p.images, p.product_year, p.quantity
                                        FROM products AS p
                                        JOIN manufacturer AS m ON p.mansx = m.manufacturer_code;";


                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $row_number = 1; // declare a variable to store the row number
                                            while ($row = $result->fetch_assoc()) {
                                                $images = explode(",", $row['images']);
                                                echo "<tr>";
                                                echo "<td>" . $row_number++ . "</td>";
                                                echo "<td>" . $row['product_name'] . "</td>";
                                                echo "<td>" . $row['product_id'] . "</td>";
                                                echo "<td>" . $row['product_type'] . "</td>";
                                                echo "<td>" . $row['manufacturer_name'] . "</td>";
                                                echo "<td>" . number_format($row['price']) . "đ</td>";
                                                echo "<td>" . $row['product_details'] . "</td>";

                                                echo "<td> <img src=\"" . $row["image"] . "\" alt=\"\" style=\"max-width: 150px; max-height: 150px;\"> </td>";

                                                echo "<td>" . implode(", ", $images) . "</td>";
                                                echo "<td>" . $row['product_year'] . "</td>";
                                                echo "<td>" . $row['quantity'] . "</td>";
                                                echo "<td><a href='product-edit.php?action=product-edit&id=" . $row['id'] . "'>Sửa</a> |<a href='javascript:confirmDelete(\"" . $row['id'] . "\", \"" . $row_number-1 . "\");'>Xóa</a></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        DongKetNoi($conn);

                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <a href="insert.php" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-square"></i>
                                </span>
                                <span class="text">Thêm sản phẩm</span>
                            </a>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <?php
            include 'templates/footer.php';
            ?>

</body>

</html>