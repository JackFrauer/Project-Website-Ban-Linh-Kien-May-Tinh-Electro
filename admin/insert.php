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
                    // Check if the submit button is clicked
                    if (isset($_POST['submit'])) {
                        // Retrieve the form data
                        $product_id = $_POST['product_id'];
                        $product_name = $_POST['product_name'];
                        $product_details = $_POST['product_details'];
                        $product_type = $_POST['product_type'];
                        $mansx = $_POST['mansx'];
                        $product_year = $_POST['product_year'];
                        $price = $_POST['price'];
                        $quantity = $_POST['quantity'];
                        $product_description = $_POST['product_description'];
                        $more_details = $_POST['more_details'];


















                        // Connect to the database
                        include 'connect.php';
                        $conn = MoKetNoi();

                        //select database
                        mysqli_select_db($conn, "pc");

                        // Insert the product record into the database
                        $sql = "INSERT INTO products (product_id, product_name, product_details, product_type, mansx, product_year, price, quantity, product_description, more_details) VALUES ('$product_id', '$product_name', '$product_details', '$product_type', '$mansx', $product_year, $price, $quantity, '$product_description', '$more_details')";
                        $result = $conn->query($sql);






                        // Handle image uploads
                        if (!empty($_FILES['image']['name'])) {
                            // Check if the file size is within the limit
                            $max_size = 5 * 1024 * 1024; // 5 MB in bytes
                            if ($_FILES['image']['size'] > $max_size) {
                                echo "<script>alert('Error: Chỉ được upload các dưới 5MB');window.location.href=window.location.href;</script>";
                                // you can redirect the user back to the form or show an error message
                                exit();
                            }

                            // Check if the file type is an image
                            $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
                            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                                echo "<script>alert('Error: Chỉ được upload các định dạng JPG, JPEG, PNG & GIF.');window.location.href=window.location.href;</script>";
                                // you can redirect the user back to the form or show an error message
                                exit();
                            }

                            // Upload the main product image
                            $target_dir = "../images/";
                            $target_file = $target_dir . basename($_FILES['image']['name']);
                            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

                            // Copy the main product image to another folder
                            $copy_dir = "images/";
                            $copy_file = $copy_dir . basename($_FILES['image']['name']);
                            copy($target_file, $copy_file);

                            // Update the image field in the product record
                            $image = str_replace("../", "", $target_file);
                            $sql = "UPDATE products SET image='$image' WHERE product_id='$product_id'";
                            $result = $conn->query($sql);
                        } else {
                            // if the file input is empty use javascript to display an error message
                            echo "<script>alert('Vẫn sẽ nhập sản phẩm, hãy nhớ thêm hình!.');window.location.href=window.location.href;</script>";

                            // you can redirect the user back to the form or show an error message
                        }
















                        if (!empty($_FILES['images']['name'])) {
                            $valid_formats = array("jpg", "jpeg", "png", "gif");
                            $max_file_size = 5 * 1024 * 1024; // 5 MB

                            $image_list = "";
                            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                                $file_name = $_FILES['images']['name'][$key];
                                $file_size = $_FILES['images']['size'][$key];
                                $file_type = $_FILES['images']['type'][$key];
                                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                                if ($file_size > $max_file_size) {
                                    echo "<script>alert('Error: Chỉ được upload các dưới 5MB');window.location.href=window.location.href;</script>";
                                    exit;
                                }
                                if (!in_array($file_ext, $valid_formats)) {
                                    echo "<script>alert('Error: Chỉ được upload các định dạng JPG, JPEG, PNG & GIF.');window.location.href=window.location.href;</script>";
                                    exit;
                                }

                                // Upload the additional product image
                                $target_dir = "../images/";
                                $target_file = $target_dir . basename($file_name);
                                move_uploaded_file($tmp_name, $target_file);

                                // Copy the additional product image to another folder
                                $copy_dir = "images/";
                                $copy_file = $copy_dir . basename($file_name);
                                copy($target_file, $copy_file);

                                // Add the image name to the image list
                                $image_list .= str_replace("../", "", $target_file) . ",";
                            }
                            $image_list = rtrim($image_list, ",");

                            // Update the images field in the product record
                            $images = str_replace("../", "", $image_list);
                            $sql = "UPDATE products SET images='$images' WHERE product_id='$product_id'";
                            $result = $conn->query($sql);
                        } else {
                            // if the file input is empty use javascript to display an error message
                            echo "<script>alert('Vẫn sẽ nhập sản phẩm, hãy nhớ thêm hình!.');window.location.href=window.location.href;</script>";

                            // you can redirect the user back to the form or show an error message
                        }
















                        //use javascript to go back to the product list page and display a message to success
                        echo "<script>alert('Thêm sản phẩm thành công!');</script>";
                        echo "<script>window.location.href='table2.php';</script>";
                        // Close the database connection
                        $conn->close();
                    }

                    // Redirect to the product list page

                    ?>





































                    <form method="post" enctype="multipart/form-data">
                        <label>Mã sản phẩm:</label>
                        <input type="text" name="product_id" class="form-control"><br>
                        <label>Tên sản phẩm:</label>
                        <input type="text" name="product_name" class="form-control"><br>
                        <label>Giới thiệu sản phẩm:</label>
                        <textarea name="product_details" id="product_details_editor"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#product_details_editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        <label>Loại sản phẩm:</label>
                        <select name="product_type" class="form-control">
                            <option value="">Chọn loại sản phẩm</option>
                            <?php
                            // Connect to the database
                            include 'connect.php';
                            $conn = MoKetNoi();
                            //select database
                            mysqli_select_db($conn, "pc");

                            $sql = "SELECT distinct product_type from products";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['product_type'] . "'>" . $row['product_type'] . "</option>";
                                }
                            }
                            DongKetNoi($conn);
                            ?>
                        </select><br>


                        <label>Nhà sản xuất:</label>
                        <select name="mansx" class="form-control">
                            <option value="">Chọn nhà sản xuất</option>
                            <?php
                            // Connect to the database
                           
                            $conn = MoKetNoi();
                            //select database
                            mysqli_select_db($conn, "pc");

                            $sql = "SELECT * FROM manufacturer";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['manufacturer_code'] . "'>" . $row['manufacturer_name'] . "</option>";
                                }
                            }


                            ?>
                        </select><br>
                        <label>Năm sản xuất:</label>
                        <input type="text" name="product_year" class="form-control"><br>
                        <label>Giá:</label>
                        <input type="text" name="price" class="form-control"><br>
                        <label>Số lượng:</label>
                        <input type="text" name="quantity" class="form-control"><br>
                        <label>Chi tiết sản phẩm:</label>
                        <textarea name="product_description" id="product_description_editor"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#product_description_editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        <label>Chi tiết thêm:</label>
                        <textarea name="more_details" id="more_details_editor"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#more_details_editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        <label>Hình đại diện:</label>
                        <input type="file" name="image" class="form-control"><br>
                        <label>Hình thêm:</label>
                        <input type="file" name="images[]" multiple class="form-control"><br>
                        <input type="submit" name="submit" value="Add" class="btn btn-primary mt-3 form-control">
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