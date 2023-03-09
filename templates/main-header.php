	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +84938976425</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> ttuantrung1@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 745/28 Ho Chi Minh</a></li>
				</ul>
				<ul class="header-links pull-right">

					<li><a href="#"><i class="fa fa-user-o"></i> Tài Khoản</a></li>



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
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div class="qty">2</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty">3</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>

										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product02.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
									</div>
									<div class="cart-summary">
										<small>3 Item(s) selected</small>
										<h5>SUBTOTAL: $2940.00</h5>
									</div>
									<div class="cart-btns">
										<a href="#">View Cart</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
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