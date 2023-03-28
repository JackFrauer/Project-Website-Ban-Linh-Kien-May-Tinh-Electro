<?php
include 'templates/header.php';
?>

<body>
	<?php
	include 'templates/main-header.php';
	?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#">Danh mục sản phẩm</a></li>
			
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<?php
				include 'templates/aside-store.php'
				?>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="store-sort">
							<label>
								Sort By:
								<select class="input-select">
									<option value="0">Popular</option>
									<option value="1">Position</option>
								</select>
							</label>

							<label>
								Show:
								<select class="input-select">
									<option value="0">20</option>
									<option value="1">50</option>
								</select>
							</label>
						</div>
						<ul class="store-grid">
							<li class="active"><i class="fa fa-th"></i></li>
							<li><a href="#"><i class="fa fa-th-list"></i></a></li>
						</ul>
					</div>
					<!-- /store top filter -->

					<!-- store products -->
					<div class="row">
						<!-- product -->

						<?php

						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						if (isset($_GET['category']) && isset($_GET['keyword'])) {
							$category = $_GET['category'];
							$keyword = $_GET['keyword'];
							error_reporting(0);
							if ($category == "all") {

								$sql = "SELECT * FROM products where product_name like '$keyword%'";
								$result = $conn->query($sql) or die(mysqli_error($conn));
								$tongdong = mysqli_num_rows($result);

								$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
								$soluong = 20;
								$tongsotrang = ceil($tongdong / $soluong);
								if ($tranghientai > $tongsotrang) {
									$tranghientai = $tongsotrang;
								} else if ($tranghientai < 1) {
									$tranghientai = 1;
								}
								$batdau = ($tranghientai - 1) * $soluong;

								$truyvan = "SELECT * FROM products where product_name like '$keyword%' limit $batdau, $soluong";
								$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
							} elseif ($category == "LinhKien") {
								$sql = "SELECT * FROM products where product_name  like '$keyword%'";
								$result = $conn->query($sql) or die(mysqli_error($conn));
								$tongdong = mysqli_num_rows($result);

								$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
								$soluong = 20;
								$tongsotrang = ceil($tongdong / $soluong);
								if ($tranghientai > $tongsotrang) {
									$tranghientai = $tongsotrang;
								} else if ($tranghientai < 1) {
									$tranghientai = 1;
								}
								$batdau = ($tranghientai - 1) * $soluong;
								$truyvan = "SELECT * FROM products where product_type in('GPU','CPU')  and  product_name like '$keyword%' limit $batdau, $soluong";
								$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
							} elseif ($category == "Phukien") {
								$sql = "SELECT * FROM products where product_name like '$keyword%'";
								$result = $conn->query($sql) or die(mysqli_error($conn));
								$tongdong = mysqli_num_rows($result);

								$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
								$soluong = 20;
								$tongsotrang = ceil($tongdong / $soluong);
								if ($tranghientai > $tongsotrang) {
									$tranghientai = $tongsotrang;
								} else if ($tranghientai < 1) {
									$tranghientai = 1;
								}
								$batdau = ($tranghientai - 1) * $soluong;
								$truyvan = "SELECT * FROM products where product_type in('KB','MICE') and  product_name like '$keyword%' limit $batdau, $soluong";
								$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
							}
							elseif($category=="CPU"){
								$sql = "SELECT * FROM products where product_name like '$keyword%'";
								$result = $conn->query($sql) or die(mysqli_error($conn));
								$tongdong = mysqli_num_rows($result);

								$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
								$soluong = 20;
								$tongsotrang = ceil($tongdong / $soluong);
								if ($tranghientai > $tongsotrang) {
									$tranghientai = $tongsotrang;
								} else if ($tranghientai < 1) {
									$tranghientai = 1;
								}
								$batdau = ($tranghientai - 1) * $soluong;
								$truyvan = "SELECT * FROM products where product_type in('CPU') and  product_name like '$keyword%' limit $batdau, $soluong";
								$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
							}
							elseif($category=="GPU"){
								$sql = "SELECT * FROM products where product_name like '$keyword%'";
								$result = $conn->query($sql) or die(mysqli_error($conn));
								$tongdong = mysqli_num_rows($result);

								$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
								$soluong = 20;
								$tongsotrang = ceil($tongdong / $soluong);
								if ($tranghientai > $tongsotrang) {
									$tranghientai = $tongsotrang;
								} else if ($tranghientai < 1) {
									$tranghientai = 1;
								}
								$batdau = ($tranghientai - 1) * $soluong;
								$truyvan = "SELECT * FROM products where product_type in('GPU') and  product_name like '$keyword%' limit $batdau, $soluong";
								$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
							}
							elseif($category=="Laptop"){
								$sql = "SELECT * FROM products where product_name like '$keyword%'";
								$result = $conn->query($sql) or die(mysqli_error($conn));
								$tongdong = mysqli_num_rows($result);

								$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
								$soluong = 20;
								$tongsotrang = ceil($tongdong / $soluong);
								if ($tranghientai > $tongsotrang) {
									$tranghientai = $tongsotrang;
								} else if ($tranghientai < 1) {
									$tranghientai = 1;
								}
								$batdau = ($tranghientai - 1) * $soluong;
								$truyvan = "SELECT * FROM products where product_type in('LAPTOP') and  product_name like '$keyword%' limit $batdau, $soluong";
								$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));
							}
							if ($result->num_rows > 0) {

								// loop through each row of data
								for ($i = 1; $i <= mysqli_num_rows($ketqua); $i++) {
									$row =  mysqli_fetch_array($ketqua);
									// echo data into HTML template

									echo '<div class="col-md-4 col-xs-6">';
									echo '<div class="product">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '<div class="product-label">';
									echo '<span class="new">MỚI</span>';
									echo '</div>';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="product.php?action=product&id=' . $row['id'] . '">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									// ... add more code for product rating and buttons ... 
									echo '<div class="product-rating">';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star-o empty"></i>';
									echo '</div>';
									echo '<div class="product-btns">';
									echo '<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>';
									echo '<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>';
									echo '<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>';
									echo '</div>';
									echo '</div>';
									// ... add more code for add to cart button ...
									echo '<div class="add-to-cart">
									<a href="cart.php?action=add&id=' . $row['id'] . '"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Add to cart</button> </a>
									</div>';
									echo '</div>';
									echo '</div>';
									if ($i == 3) {
										echo '<div class="clearfix visible-lg visible-md"></div>';
									}
									if ($i % 2 == 0 &&  $i != 6) {
										echo '<div class="clearfix visible-sm visible-xs"></div>';
									}
									if ($i == 6) {
										echo '	<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>';
									}
								}
							} else {
								// no data found
								echo "0 results";
							}

							echo '</div>';
							echo '<div class="store-filter clearfix">';


							echo '<ul class="store-pagination">';


							if ($tranghientai > 1 && $tongsotrang > 1) {
								echo '<li><a href="store.php?trang=' . ($tranghientai - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
							}

							for ($i = 1; $i <= $tongsotrang; $i++) {
								if ($i == $tranghientai) {
									echo '<li class="active">' . $i . '</li>';
								} else {
									echo '<li><a href=store.php?trang=' . $i . '>' . $i . '</a></li>';
								}
							}
							if ($tranghientai < $tongsotrang && $tongsotrang > 1) {
								echo '<li><a href="store.php?trang=' . ($tranghientai + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
							}

							echo '</ul>';
							echo '</div>';
						} else {
							$sql = "SELECT * FROM products";
							$result = $conn->query($sql) or die(mysqli_error($conn));
							$tongdong = mysqli_num_rows($result);
							$tranghientai = isset($_GET['trang']) ? $_GET['trang'] : 1;
							$soluong = 9;
							$tongsotrang = ceil($tongdong / $soluong);
							if ($tranghientai > $tongsotrang) {
								$tranghientai = $tongsotrang;
							} else if ($tranghientai < 1) {
								$tranghientai = 1;
							}
							$batdau = ($tranghientai - 1) * $soluong;


							$truyvan = "SELECT * FROM products limit $batdau, $soluong";
							$ketqua = mysqli_query($conn, $truyvan) or die(mysqli_error($conn));

							// display data in HTML template
							if ($result->num_rows > 0) {

								// loop through each row of data
								for ($i = 1; $i <= mysqli_num_rows($ketqua); $i++) {
									$row =  mysqli_fetch_array($ketqua);
									// echo data into HTML template

									echo '<div class="col-md-4 col-xs-6">';
									echo '<div class="product">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '<div class="product-label">';
									echo '<span class="new">MỚI</span>';
									echo '</div>';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="product.php?action=product&id=' . $row['id'] . '">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									// ... add more code for product rating and buttons ...
									echo '<div class="product-rating">';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star"></i>';
									echo '<i class="fa fa-star-o empty"></i>';
									echo '</div>';
									echo '<div class="product-btns">';
									echo '<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>';
									echo '<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>';
									echo '<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>';
									echo '</div>';
									echo '</div>';
									// ... add more code for add to cart button ...
									echo '<div class="add-to-cart">
									<a href="cart.php?action=add&id=' . $row['id'] . '"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Add to cart</button> </a>
								</div>';
									echo '</div>';
									echo '</div>';
									if ($i == 3) {
										echo '<div class="clearfix visible-lg visible-md"></div>';
									}
									if ($i % 2 == 0 &&  $i != 6) {
										echo '<div class="clearfix visible-sm visible-xs"></div>';
									}
									if ($i == 6) {
										echo '	<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>';
									}
								}
							} else {
								// no data found
								echo "0 results";
							}
							echo '</div>';
							echo '<div class="store-filter clearfix">';


							echo '<ul class="store-pagination">';


							if ($tranghientai > 1 && $tongsotrang > 1) {
								echo '<li><a href="store.php?trang=' . ($tranghientai - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
							}

							for ($i = 1; $i <= $tongsotrang; $i++) {
								if ($i == $tranghientai) {
									echo '<li class="active">' . $i . '</li>';
								} else {
									echo '<li><a href=store.php?trang=' . $i . '>' . $i . '</a></li>';
								}
							}
							if ($tranghientai < $tongsotrang && $tongsotrang > 1) {
								echo '<li><a href="store.php?trang=' . ($tranghientai + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
							}

							echo '</ul>';
							echo '</div>';
							// close connection

						}
						// close connection
						DongKetNoi($conn);

						?>
						<!-- /product -->

						<!-- product -->

						<!-- /product -->

						<!-- /store products -->

						<!-- store bottom filter -->

						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<?php
		include 'templates/footer.php';
		?>

		<?php
		include 'templates/Jquery.php';
		?>

</body>

</html>