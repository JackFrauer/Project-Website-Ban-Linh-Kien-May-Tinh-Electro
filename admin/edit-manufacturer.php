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
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        // Connect to the database
                        include 'connect.php';
                        $conn = MoKetNoi();

                        //check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }


                        //select database
                        mysqli_select_db($conn, "pc");

                        // Get the data from the database
                        $sql = "SELECT * FROM manufacturer WHERE id = $id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    }
                    
                    // Check if the submit button is clicked
                    if (isset($_POST['submit'])) {
                        // Get the data from the form
                        $username = $_POST['username'];
                        $fullname = $_POST['fullname'];
   

                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Insert the data into the database
                        $sql = "UPDATE manufacturer SET manufacturer_code = '$username', manufacturer_name = '$fullname' WHERE id = $id";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query is successful
                        if ($result) {
                            // Query successful, alert and send userback to tables.php
                            echo "<script>alert('Cập nhật thành công!'); window.location.href='index.php';</script>";
                        } else {
                            // Query failed, alert and send userback to tables.php
                            echo "<script>alert('Cập nhật thất bại!'); window.location.href='index.php';</script>";
                        }
                    }

                    ?>
                     <form method="post" enctype="multipart/form-data">
                        <label>ID:</label>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" class="form-control" readonly>
                        <label>Mã nhà sản xuất:</label>
                        <input type="text" name="username" value="<?php echo $row['manufacturer_code']; ?>" class="form-control" required>
                        <label>Tên nhà sản xuất:</label>
                        <input type="text" name="fullname" value="<?php echo $row['manufacturer_name']; ?>" class="form-control" required>

                        <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary mt-3 form-control">

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