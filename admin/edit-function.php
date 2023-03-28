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



                    <?php
                    // Include the connect.php file
                    include 'connect.php';
                    // Connect to the database
                    $conn = MoKetNoi();
                    // Check for connection error
                    if ($conn->connect_error) {
                        echo "Không kết nối được với MySQL";
                    }

                    // Select the database
                    mysqli_select_db($conn, "pc");
                    // Check if the form is submitted
                    if (isset($_GET['action']) && $_GET['action'] == "edit-product") {
                        // Get the id of the product to edit
                        $id = intval($_GET['id']);
                        // Get the form data
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

                        // Initialize variables for image and images
                        $image = "";
                        $images = "";

                        // Check if the image file is uploaded
                        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                            // Get the image file name
                            $image_name = $_FILES['image']['name'];
                            // Get the image file size
                            $image_size = $_FILES['image']['size'];
                            // Get the image file type
                            $image_type = $_FILES['image']['type'];
                            // Get the image file temporary location
                            $image_tmp = $_FILES['image']['tmp_name'];

                            // Define the allowed image extensions
                            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
                            // Get the image file extension
                            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                            // Check if the image file extension is valid
                            if (in_array($image_extension, $allowed_extensions)) {
                                // Define the image upload path
                                $upload_path = "C:/xampp/htdocs/electro-master/images/";
                                // Define the image new name
                                $image_new_name = uniqid() . "." . $image_extension;
                                // Move the image file from temporary location to upload path
                                move_uploaded_file($image_tmp, $upload_path . $image_new_name);
                                // Set the image variable to the image new name
                                $image = $image_new_name;
                            } else {
                                // Display an error message if the image file extension is invalid
                                echo "Invalid image file extension.";
                            }
                        }

                        // Check if the images files are uploaded
                        if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
                            // Loop through each images file
                            for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                                // Check if the images file has no error
                                if ($_FILES['images']['error'][$i] == 0) {
                                    // Get the images file name
                                    $images_name = $_FILES['images']['name'][$i];
                                    // Get the images file size
                                    $images_size = $_FILES['images']['size'][$i];
                                    // Get the images file type
                                    $images_type = $_FILES['images']['type'][$i];
                                    // Get the images file temporary location
                                    $images_tmp = $_FILES['images']['tmp_name'][$i];

                                    // Define the allowed images extensions
                                    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
                                    // Get the images file extension
                                    $images_extension = pathinfo($images_name, PATHINFO_EXTENSION);
                                    // Check if the images file extension is valid
                                    if (in_array($images_extension, $allowed_extensions)) {
                                        // Define the images upload path
                                        $upload_path = "C:/xampp/htdocs/electro-master/images/";
                                        // Define the images new name
                                        $images_new_name = uniqid() . "." . $images_extension;
                                        // Move the images file from temporary location to upload path
                                        move_uploaded_file($images_tmp, $upload_path . $images_new_name);
                                        // Append the images new name to the images variable with a comma separator
                                        $images .= ($i == 0 ? "" : ",") . $images_new_name;
                                    } else {
                                        // Display an error message if the images file extension is invalid
                                        echo "Invalid images file extension.";
                                    }
                                }
                            }
                        }

                        // Define the SQL statement to update the product in the table
                        $sql = "UPDATE products SET product_id='$product_id', product_name='$product_name', product_details='$product_details', product_type='$product_type', mansx='$mansx', product_year='$product_year', price='$price', quantity='$quantity', image='$image', images='$images', product_description='$product_description', more_details='$more_details' WHERE id='$id'";
                        // Execute the SQL statement
                        echo $sql;
                        $query = mysqli_query($conn, $sql);
                        // Check if the SQL statement is successful
                        if ($query) {
                            // Display a success message and redirect to the products page
                            echo "Product updated successfully.";
                            header("Location: table2.php");
                        } else {
                            // Display an error message if the SQL statement fails
                            echo "Error updating product: " . mysqli_error($conn);
                        }
                    }
                    // Close the database connection
                    mysqli_close($conn);
                    ?>




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