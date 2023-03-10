<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Top selling</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
							<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
							<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
							<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<!-- product -->
								<?php
								$conn = MoKetNoi();
								if ($conn->connect_error) {
									echo "Không kết nối được với MySQL";
								}
								mysqli_select_db($conn, "pc");
								// select data from products table
								$sql = "SELECT * FROM products order by id desc";
								$result = $conn->query($sql);

								// display data in HTML template
								if ($result->num_rows > 0) {
									// loop through each row of data
									while ($row = $result->fetch_assoc()) {
										// echo data into HTML template
										echo '<div class="product">';
										echo '<div class="product-img">';
										echo '<img src="' . $row["image"] . '" alt="">';
										echo '<div class="product-label">';
										echo '<span class="new">Bán chạy</span>';
										echo '</div>';
										echo '</div>';
										echo '<div class="product-body">';
										echo '<p class="product-category">' . $row["product_type"] . '</p>';
										echo '<h3 class="product-name"><a href="#">' . $row["product_name"] . '</a></h3>';
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
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
										<a href="cart.php?action=add&id='.$row['id'].'">Add to cart</a></button>
									</div>';
										echo '</div>';
									}
								} else {
									// no data found
									echo "0 results";
								}

								// close connection
								DongKetNoi($conn);
								?>
								<!-- /product -->
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>