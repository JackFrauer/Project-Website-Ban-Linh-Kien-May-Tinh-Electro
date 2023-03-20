<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">CPU</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-3">
					<div>
						<?php
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						$sql = "SELECT * FROM products where product_type ='CPU' order by id asc";
						$result = $conn->query($sql);

						// display data in HTML template
						if ($result->num_rows > 0) {
							// create a counter variable
							$counter = 0;
							// loop through each row of data
							while ($row = $result->fetch_assoc()) {
								// check if counter is less than 3
								if ($counter < 3) {
									// echo data into HTML template
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="product.php?action=product&id=' . $row['id'] . '">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									echo '</div>';
									echo '</div>';
									// increment counter by 1
									$counter++;
								} else {
									// break out of the loop
									break;
								}
							}
						} else {
							// no data found
							echo "0 results";
						}
						// close connection
						DongKetNoi($conn);
						?>
					</div>
					<!--end of product-->
					<div>
						<?php
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						$sql = "SELECT * FROM products where product_type ='CPU' order by id desc";
						$result = $conn->query($sql);

						// display data in HTML template
						if ($result->num_rows > 0) {
							// create a counter variable
							$counter = 0;
							// loop through each row of data
							while ($row = $result->fetch_assoc()) {
								// check if counter is less than 3
								if ($counter < 3) {
									// echo data into HTML template
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="#">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									echo '</div>';
									echo '</div>';
									// increment counter by 1
									$counter++;
								} else {
									// break out of the loop
									break;
								}
							}
						} else {
							// no data found
							echo "0 results";
						}
						// close connection
						DongKetNoi($conn);
						?>
					</div>
					<!--end of product-->

				</div>
			</div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Laptops</h4>
					<div class="section-nav">
						<div id="slick-nav-4" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-4">
					<!--end of product-->
					<div>
						<?php
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						$sql = "SELECT * FROM products where product_type ='LAPTOP' order by id desc";
						$result = $conn->query($sql);

						// display data in HTML template
						if ($result->num_rows > 0) {
							// create a counter variable
							$counter = 0;
							// loop through each row of data
							while ($row = $result->fetch_assoc()) {
								// check if counter is less than 3
								if ($counter < 3) {
									// echo data into HTML template
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="#">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									echo '</div>';
									echo '</div>';
									// increment counter by 1
									$counter++;
								} else {
									// break out of the loop
									break;
								}
							}
						} else {
							// no data found
							echo "0 results";
						}
						// close connection
						DongKetNoi($conn);
						?>
					</div>
					<!--end of product-->

					<!--end of product-->
					<div>
						<?php
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						$sql = "SELECT * FROM products where product_type ='LAPTOP' order by id asc";
						$result = $conn->query($sql);

						// display data in HTML template
						if ($result->num_rows > 0) {
							// create a counter variable
							$counter = 0;
							// loop through each row of data
							while ($row = $result->fetch_assoc()) {
								// check if counter is less than 3
								if ($counter < 3) {
									// echo data into HTML template
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="#">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									echo '</div>';
									echo '</div>';
									// increment counter by 1
									$counter++;
								} else {
									// break out of the loop
									break;
								}
							}
						} else {
							// no data found
							echo "0 results";
						}
						// close connection
						DongKetNoi($conn);
						?>
					</div>
					<!--end of product-->
				</div>
			</div>

			<div class="clearfix visible-sm visible-xs"></div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Phụ kiện</h4>
					<div class="section-nav">
						<div id="slick-nav-5" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-5">
					<!--end of product-->
					<div>
						<?php
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						$sql = "SELECT * FROM products where product_type IN ('KB','MICE')order by rand()";
						$result = $conn->query($sql);

						// display data in HTML template
						if ($result->num_rows > 0) {
							// create a counter variable
							$counter = 0;
							// loop through each row of data
							while ($row = $result->fetch_assoc()) {
								// check if counter is less than 3
								if ($counter < 3) {
									// echo data into HTML template
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="#">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									echo '</div>';
									echo '</div>';
									// increment counter by 1
									$counter++;
								} else {
									// break out of the loop
									break;
								}
							}
						} else {
							// no data found
							echo "0 results";
						}
						// close connection
						DongKetNoi($conn);
						?>
					</div>
					<!--end of product-->
					<!--end of product-->
					<div>
						<?php
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");
						// select data from products table
						$sql = "SELECT * FROM products where product_type IN ('KB','MICE')order by rand()";
						$result = $conn->query($sql);

						// display data in HTML template
						if ($result->num_rows > 0) {
							// create a counter variable
							$counter = 0;
							// loop through each row of data
							while ($row = $result->fetch_assoc()) {
								// check if counter is less than 3
								if ($counter < 3) {
									// echo data into HTML template
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="' . $row["image"] . '" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<p class="product-category">' . $row["product_type"] . '</p>';
									echo '<h3 class="product-name"><a href="#">' . $row["product_name"] . '</a></h3>';
									echo '<h4 class="product-price">' . number_format($row["price"]) . '₫</h4>';
									echo '</div>';
									echo '</div>';
									// increment counter by 1
									$counter++;
								} else {
									// break out of the loop
									break;
								}
							}
						} else {
							// no data found
							echo "0 results";
						}
						// close connection
						DongKetNoi($conn);
						?>
					</div>
					<!--end of product-->
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>