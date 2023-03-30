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
                        $sql = "SELECT * FROM user WHERE id = $id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                    }

                    // Check if the submit button is clicked
                    // Check if the submit button is clicked
                    if (isset($_POST['submit'])) {
                        // Get the data from the form
                        $username = $_POST['username'];
                        $fullname = $_POST['fullname'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $role = $_POST['role'];

                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Update the data in the database
                        $sql = "UPDATE user SET username = '$username', fullname = '$fullname', password = '$hashed_password', email = '$email', phone = '$phone', address = '$address', role = '$role' WHERE id = $id";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query is successful
                        if ($result) {
                            // Query successful, alert and send user back to tables.php
                            echo "<script>alert('Cập nhật người dùng thành công!'); window.location.href='tables.php';</script>";
                        } else {
                            // Query failed, alert and send user back to tables.php
                            echo "<script>alert('Cập nhật người dùng thất bại!'); window.location.href='tables.php';</script>";
                        }
                    }


                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <label>Tên đăng nhập:</label>
                        <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" required>
                        <label>Họ và tên:</label>
                        <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" class="form-control" required>
                        <label>Mật khẩu:</label>
                        <input type="password" name="password" value="" class="form-control" required>
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        <label>Số điện thoại:</label>
                        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" required>
                        <label>Địa chỉ:</label>
                        <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" required>
                        <label>Quyền:</label>
                        <select name="role" class="form-control">
                            <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                            <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
                        </select>
                        <br>
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