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
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $role = $_POST['role'];

                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Insert the data into the database
                        $sql = "INSERT INTO user (username, fullname, password, email, phone, address, role) VALUES ('$username', '$fullname', '$hashed_password', '$email', '$phone', '$address', '$role')";
                        $result = mysqli_query($conn, $sql);

                        // Check if the query is successful
                        if ($result) {
                            // Query successful, alert and send userback to tables.php
                            echo "<script>alert('Thêm người dùng thành công!'); window.location.href='tables.php';</script>";
                        } else {
                            // Query failed, alert and send userback to insert-user.php
                            echo "<script>alert('Thêm người dùng thất bại!'); window.location.href='insert-user.php';</script>";
                            
                        }
                    }
                    ?>



                    <form method="post" enctype="multipart/form-data">
                        <label>Tên người dùng:</label>
                        <input type="text" name="username" class="form-control"><br>
                        <label>Họ tên:</label>
                        <input type="text" name="fullname" class="form-control"><br>
                        <label>Password:</label>
                        <!-- make input have show and hide passowrd button -->
                        <input type="password" name="password" id="password" class="form-control">
                        <input type="checkbox" onclick="myFunction()">Show Password<br>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control"><br>
                        <label>Số điện thoại:</label>
                        <!-- input the phone number not text -->
                        <input type="number" name="phone" class="form-control"><br>
                        <label>Địa chỉ:</label>
                        <input type="text" name="address" class="form-control"><br>
                        <label>Quyền:</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select><br>
                        <input type="submit" name="submit" value="Thêm người dùng" class="btn btn-primary mt-3 form-control">
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