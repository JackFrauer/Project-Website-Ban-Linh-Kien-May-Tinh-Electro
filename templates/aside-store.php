<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">

							<div class="input-checkbox">
								<input type="checkbox" id="category-1">
								<label for="category-1">
									<span></span>
									Laptops
									<small>(120)</small>
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-2">
								<label for="category-2">
									<span></span>
									Smartphones
									<small>(740)</small>
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-3">
								<label for="category-3">
									<span></span>
									Cameras
									<small>(1450)</small>
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-4">
								<label for="category-4">
									<span></span>
									Accessories
									<small>(578)</small>
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-5">
								<label for="category-5">
									<span></span>
									Laptops
									<small>(120)</small>
								</label>
							</div>

							<div class="input-checkbox">
								<input type="checkbox" id="category-6">
								<label for="category-6">
									<span></span>
									Smartphones
									<small>(740)</small>
								</label>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<span>-</span>
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Brand</h3>
						<div class="checkbox-filter">
							<div class="input-checkbox">
								<input type="checkbox" id="brand-1">
								<label for="brand-1">
									<span></span>
									SAMSUNG
									<small>(578)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-2">
								<label for="brand-2">
									<span></span>
									LG
									<small>(125)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-3">
								<label for="brand-3">
									<span></span>
									SONY
									<small>(755)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-4">
								<label for="brand-4">
									<span></span>
									SAMSUNG
									<small>(578)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-5">
								<label for="brand-5">
									<span></span>
									LG
									<small>(125)</small>
								</label>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="brand-6">
								<label for="brand-6">
									<span></span>
									SONY
									<small>(755)</small>
								</label>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Phụ kiện</h3>
						<?php
                        include 'connect.php';
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
					<!-- /aside Widget -->
				</div>