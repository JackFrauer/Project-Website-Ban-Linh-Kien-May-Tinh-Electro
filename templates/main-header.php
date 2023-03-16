		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<?php
						session_start();
						if (isset($_SESSION['TENDANGNHAP']) && $_SESSION['TENDANGNHAP']) {
							if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

								echo '<li class="dropdown"><a href="login.php" data-toggle="dropdown"><i class="fa fa-user-o" ></i>Xin chào ' . $_SESSION['TEN'] . '</a> </li>
								<li><a href="logout.php"><i class="fa fa-sign-out"></i>Admin</a></li>
								
							<li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>';
							}
							if (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {
								echo '<li><a href=""><i class="fa fa-sign-out"></i>Xin chào ' . $_SESSION['TEN'] . '</a></li>
						<li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>';
							}
						} else {
							echo '<li class="dropdown"><a href="login.php"><i class="fa fa-user-o" ></i>Đăng nhập</a> </li>';
					
						}
						?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="index.php" method="post">
									<select class="input-select" name="category">
										<option value="all" name="chon">All</option>
										<option value="LinhKien" name="chon">Linh kiện</option>
										<option value="Phukien" name="chon"> Phụ kiện</option>
									</select>
									<input class="input" placeholder="Search here" name="txtTim">
									<button class="search-btn" type="submit" name="submit">Search</button>
								</form>
							</div>
						</div>
						<?php

						include 'connect.php';
						$conn = MoKetNoi();
						if ($conn->connect_error) {
							echo "Không kết nối được với MySQL";
						}
						mysqli_select_db($conn, "pc");

						if (isset($_POST['submit'])) {
							// Get user input from form
							$category = $_POST['category'];
							$keyword = $_POST['txtTim'];
							// Check if user input is empty
							header("Location: store.php?category=$category&keyword=$keyword");
							exit();
						}
						?>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="https://github.com/JackFrauer/DeAn">
										<i class="fa fa-github"></i>
										<span>Github</span>

									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<?php

								if (isset($_SESSION['cart'] ) && $_SESSION['cart']){
									echo '<div class="dropdown">';
									echo '<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">';
									echo '<i class="fa fa-shopping-cart"></i>';
									echo '<span>Giỏ Hàng</span>';
									$count = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
									echo '<div class="qty">' . $count . '</div>';
									echo '</a>';
									echo '<div class="cart-dropdown">';
									$sql = "SELECT * FROM products WHERE id IN (";

									foreach ($_SESSION['cart'] as $id => $value) {
										$sql .= $id . ",";
									}

									$sql = substr($sql, 0, -1) . ") ORDER BY id ASC";

									$query = mysqli_query($conn, $sql);
									$totalprice = 0;

									while ($row = mysqli_fetch_array($query)) {
										$subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['price'];
										$totalprice += $subtotal;
								?>
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="<?php echo $row['image'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="product.php?action=product&id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h3>
													<h4 class="product-price"><span class="qty"><?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>x</span><?php echo number_format($_SESSION['cart'][$row['id']]['quantity'] * $row['price']) ?>đ </h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
									<?php
									}
									?>
									<div class="cart-summary">
									<small>Đang có <?php echo $count ?> sản phẩm trong giỏ hàng</small>
									<h5>SUBTOTAL: <?php echo number_format($totalprice) ?>đ</h5>
								</div>
								<div class="cart-btns">
									<a href="cart2.php">View Cart</a>
									<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
								</div>
									

						




								<?php
								}
								else {
									echo '<div class="dropdown">';
									echo '<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">';
									echo '<i class="fa fa-shopping-cart"></i>';
									echo '<span>Giỏ Hàng</span>';
									$count = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
									echo '<div class="qty">' . $count . '</div>';
									echo '</a>';
									echo '<div class="cart-dropdown">';
									echo '<div class="cart-list">';
									echo '<div class="product-widget">';
									echo '<div class="product-img">';
									echo '<img src="images/empty-cart.png" alt="">';
									echo '</div>';
									echo '<div class="product-body">';
									echo '<h3 class="product-name">Giỏ hàng trống</h3>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
								?>

							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Trang chủ</a></li>
						<li><a href="#">Deal Hot</a></li>
						<li><a href="store.php">Danh mục sản phẩm</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Linh kiện máy tính</a></li>
						<li><a href="#">Phụ kiện</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->