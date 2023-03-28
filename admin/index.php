<?php
include 'templates/header.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include 'templates/sidebar.php';
        ?>
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


                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        include 'connect.php';
                        $conn = MoKetNoi();
                        if ($conn->connect_error) {
                            echo "Không kết nối được với MySQL";
                        }
                        mysqli_select_db($conn, "pc");
                        $sql = "SELECT * FROM user";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_num_rows($result);
                        if ($row > 0) {


                        ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Số lượng người dùng</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        DongKetNoi($conn);
                        ?>


                        <!-- Earnings (Monthly) Card Example -->

                        <?php
                        $conn = MoKetNoi();
                        if ($conn->connect_error) {
                            echo "Không kết nối được với MySQL";
                        }
                        mysqli_select_db($conn, "pc");
                        $sql = "SELECT * FROM orders";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_num_rows($result);
                        if ($row > 0) {

                        ?>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Đơn đặt hàng</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        DongKetNoi($conn);
                        ?>

                        <!-- Earnings (Monthly) Card Example -->

                        <!-- Earnings (Monthly) Card Example -->
                        <?php

                        $conn = MoKetNoi();
                        if ($conn->connect_error) {
                            echo "Không kết nối được với MySQL";
                        }
                        mysqli_select_db($conn, "pc");
                        $sql = "SELECT * FROM manufacturer";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            //count number of rows
                            $rowcount = mysqli_num_rows($result);

                        ?>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Loại sản phẩm </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                    echo $rowcount;
                                                                                                    ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        DongKetNoi($conn);

                        ?>

                        <!-- Earnings (Monthly) Card Example -->


                        <?php
                        $conn = MoKetNoi();
                        if ($conn->connect_error) {
                            echo "Không kết nối được với MySQL";
                        }
                        mysqli_select_db($conn, "pc");
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            //count number of rows
                            $rowcount = mysqli_num_rows($result);

                        ?>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Số lượng sản phẩm</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    echo $rowcount;
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="	fas fa-warehouse fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php
                        }
                        DongKetNoi($conn);
                ?>

                <!-- Content Row -->



                <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên người dùng</th>
                                            <th>Họ tên</th>
                                            <th>Gmail</th>
                                            <th>Password</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Loại</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $conn = MoKetNoi();
                                        if ($conn->connect_error) {
                                            echo "Không kết nối được với MySQL";
                                        }
                                        mysqli_select_db($conn, "pc");
                                        $sql = "SELECT * FROM user";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $row_number = 1; // declare a variable to store the row number
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row_number++ . "</td>";
                                                echo "<td>" . $row['username'] . "</td>";
                                                echo "<td>" . $row['fullname'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                         
                                                echo "<td>*******************************************************
                                                </td>";
                                                echo "<td>" . $row['phone'] . "</td>";
                                                echo "<td>" . $row['address'] . "</td>";
                                                echo "<td>" . $row['role'] . "</td>";
                                                echo "<td><a href='edit.php?action=edit-user&id=" . $row['id'] . "'>Sửa</a> | <a href='javascript:confirmDeleteUser(\"" . $row['id'] . "\", \"" . $row_number-1 . "\");'>Xóa</a></td>";
                                                echo "</tr>";
                                            }
                                        }
                                        DongKetNoi($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>