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
          // Check if the ID parameter is set in the URL
          if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Connect to the database
            include 'connect.php';
            $conn = MoKetNoi();

            //select database
            mysqli_select_db($conn, "pc");


            // Retrieve the product record from the database
            $sql = "SELECT * FROM products WHERE id=$id";
            $result = $conn->query($sql);

            // Check if the product record exists
            if ($result->num_rows == 1) {
              $row = $result->fetch_assoc();

              // Handle the form submission
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

                // Update the product record in the database
                $sql = "UPDATE products SET product_id='$product_id', product_name='$product_name', product_details='$product_details', product_type='$product_type', mansx='$mansx', product_year=$product_year, price=$price, quantity=$quantity, product_description='$product_description', more_details='$more_details' WHERE id=$id";
                $result = $conn->query($sql);

                // Handle image uploads
                if (isset($_FILES["image"])) {
                  if (!empty($_FILES['image']['name'])) {
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
                    // file is not selected or there is an error
                    echo "Please select a file to upload.";
                    // you can redirect the user back to the form or show an error message
                  }
                } else {
                  // file input is not set
                  echo "Please select a file to upload.";
                  // you can redirect the user back to the form or show an error message
                }


                if (isset($_FILES["images"])) {
                  if (!empty($_FILES['images']['name'])) {
                    // Upload the additional product images
                    $target_dir = "../images/";
                    $image_list = "";
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                      $target_file = $target_dir . basename($_FILES['images']['name'][$key]);
                      move_uploaded_file($tmp_name, $target_file);

                      // Copy the additional product image to another folder
                      $copy_dir = "images/";
                      $copy_file = $copy_dir . basename($_FILES['images']['name'][$key]);
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
                    // file is not selected or there is an error
                    echo "Please select a file to upload.";
                    // you can redirect the user back to the form or show an error message
                  }
                } else {
                  // file input is not set
                  echo "Please select a file to upload.";
                  // you can redirect the user back to the form or show an error message

                }


                //alert
                if ($result) {
                  echo "<script>alert('Update product successfully!'); window.location='table2.php'</script>";
                } else {
                  echo "<script>alert('Update product failed!'); window.location='table2.php'</script>";
                }
              }

              // Display the update form
          ?>
              <form method="post" enctype="multipart/form-data">
                <label>Mã sản phẩm:</label>
                <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" class="form-control"><br>
                <label>Tên sản phẩm:</label>
                <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control"><br>
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
                  <?php
                  $sql = "SELECT DISTINCT product_type FROM products";
                  $result = $conn->query($sql);
                  while ($row_type = $result->fetch_assoc()) {
                    $selected = "";
                    if ($row_type['product_type'] == $product_type) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $row_type['product_type'] . "' " . $selected . ">" . $row_type['product_type'] . "</option>";
                  }
                  ?>
                </select><br>

                <label>Nhà sản xuất:</label>
                <select name="mansx" class="form-control">
                  <?php
                  $sql = "SELECT DISTINCT mansx FROM products";
                  $result = $conn->query($sql);
                  while ($row_mansx = $result->fetch_assoc()) {
                    $selected = "";
                    if ($row_mansx['mansx'] == $mansx) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $row_mansx['mansx'] . "' " . $selected . ">" . $row_mansx['mansx'] . "</option>";
                  }
                  ?>
                </select><br>
                <label>Năm sản xuất:</label>
                <input type="text" name="product_year" value="<?php echo $row['product_year']; ?>" class="form-control"><br>
                <label>Price:</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>" class="form-control"><br>
                <label>Số lượng:</label>
                <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" class="form-control"><br>
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
                <input type="file" name="images[]" class="form-control" multiple><br>
                <input type="submit" name="submit" class="form-control" value="Update">
              </form>
          <?php
            } else {
              echo "Product not found!";
            }
          } else {
            echo "Product not found!";
          }
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