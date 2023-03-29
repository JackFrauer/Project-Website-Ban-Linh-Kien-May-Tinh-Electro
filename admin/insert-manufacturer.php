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


                    <?php
                    // Connect to the database
                    include 'connect.php';
                    $conn = MoKetNoi();

                    //select database
                    mysqli_select_db($conn, "pc");


                    // Check if the submit button is clicked
                    if (isset($_POST['submit'])) {
                        // Get the data from the form
                        $username = $_POST['username'];
                        $fullname = $_POST['fullname'];


                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Insert the data into the database
                        $sql = "INSERT INTO manufacturer (manufacturer_code, manufacturer_name) VALUES ('$username', '$fullname')";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query is successful
                        if ($result) {
                            // Query successful, alert and send userback to tables.php
                            echo "<script>alert('Thêm thành công!'); window.location.href='tables.php';</script>";
                        } else {
                            // Query failed, alert and send userback to insert-user.php
                            echo "<script>alert('Thêm thất bại!'); window.location.href='insert-user.php';</script>";
                        }
                    }
                    ?>



                    <form method="post" enctype="multipart/form-data">
                        <label>Mã nhà sản xuất:</label>
                        <input type="text" name="username" class="form-control" placeholder="Nhập mã nhà sản xuất" required>
                        <label>Tên nhà sản xuất:</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Nhập tên nhà sản xuất" required>
        
                        <input type="submit" name="submit" value="Thêm nhà sản xuất" class="btn btn-primary mt-3 form-control">
                    </form>

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