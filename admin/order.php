<?php
include 'templates/header.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'templates/sidebar.php'; ?>
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
                    <h1 class="h3 mb-2 text-gray-800">Bảng quản lý đơn hàng</h1>
                    <p class="mb-4">Từ đây admin có thể xóa các đơn hàng khác nhau, admin chỉ được quyền xóa các đơn hàng, không được quyền điều chỉnh. <a target="_blank" href="https://github.com/JackFrauer/Website-De-An-Electro.git">Trang github của chúng tôi</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng đơn hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <?php
                                        ?>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Sản phẩm</th>
                                            <th>Tổng số hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày đặt hàng</th>
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
                                        $sql = "SELECT * FROM orders";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $row_number = 1; // declare a variable to store the row number
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row_number++ . "</td>";
                                                echo "<td>" . $row['TENKHACHHANG'] . "</td>";
                                                echo "<td>" . $row['MASANPHAM'] . "</td>";
                                                echo "<td>" . $row['SOLUONG'] . "</td>";
                                                echo "<td>" . number_format($row['THANHTIEN']) . "đ</td>";
                                                echo "<td>" . $row['createDATE'] . "</td>";
                                                echo "<td><a href='javascript:confirmDeleteOrder(\"" . $row['id'] . "\", \"" . $row_number-1 . "\");'>Xóa</a></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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