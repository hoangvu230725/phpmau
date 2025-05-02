<?php
session_start();
require "config.php";
require "models/db.php";
require "models/category.php";
require "models/product.php";
require "models/thanhvien.php";
require "models/oder.php";
$order = new Order;
$thanhvien = new Thanhvien;
$product = new Product;
$category = new Category;
$getAllCates = $category->getAllCate();
$getAllProducts = $product->getAllProducts();

if (isset($_POST['Login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	$user = $thanhvien->getThanhVien($username, $password);
	if (($user) !== null) {
		$_SESSION['user'] = $user['id'];
	} else {
		$_SESSION['user'] = 0;
		header('location:login.php');
	}
	
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Organicfood</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.webp">

	<!-- all css here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/chosen.min.css">
	<link rel="stylesheet" href="assets/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/bundle.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<!-- Add your site or application content here -->
	<!--Header start-->
	<!-- header middel area start -->
	<div class="header_middle middel_three">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header_middle_wrapper">
						<div class="header_middle_inner">
							<div class="header_top_right">
								<ul class="header_top_right_inner">
									<?php if (isset($_SESSION['user'])) {
										echo '
									<li class="language_wrapper_two">
										<a href="my_account.php">
											<span>My Account  <i class="fa fa-angle-down"></i> </span>
										</a>
										<ul class="."account__name">
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>
									';
									} else {
										echo '
										<li class="language_wrapper_two">
											<a href="login.php">
												<span>Login With Account  <i class="fa fa-angle-down"></i> </span>
											</a>
											<ul class="account__name">
												<li><a href="signup.php">Sign Up</a></li>
											</ul>
										</li>
										';
									} ?>
								</ul>
							</div>
							<div class="logo logo_three">
								<a href="index.php">
									<img src="assets/img/logo/logo.png" alt="">
								</a>
							</div>
							<div class="mini__cart cart_three">
								<div class="mini_cart_inner">
									<div class="cart_icon">
										<a href="cart.php">
											<?php $sum = 0;
											if (isset($_SESSION['cart'])) {
												$ss = count($_SESSION['cart']);
												foreach ($_SESSION["cart"] as $value) {
													$sum += $value['price'] * $value['quantity'];
												}
											?>
												<span class="cart_icon_inner">
													<i class="ion-android-cart"></i>
													<span class="cart_count"><?php echo $ss ?></span>
												</span>
												<span class="item_total"><?php echo $sum ?>,000₫</span>
											<?php } ?>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header bottom area start -->
		<div class="header_bottm bottom_three sticky-header">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="main_menu_inner  inner__three">
							<div class="menu menu_three">
								<nav>
									<ul class="menu_three_inner">
										<li class="active"><a href="index.php">Home</a>
										<li><a href="shop.php">shop</a> </li>
										<li><a href="#">about us </a> </li>
										<li>
											<div class="search_box search_three">
												<div class="search_inner">
													<form action="result.php" method="get">
														<input name="keyword" type="text" placeholder="Search our catalog">
														<button type="submit"><i class="ion-ios-search"></i></button>
													</form>
												</div>
											</div>
											</form>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="mobile-menu mobile_three d-lg-none">
					<nav>
						<ul>
							<li class="active"><a href="index.php">Home</a>
								<ul>
									<li><a href="my-account.php">My account</a></li>
									<li><a href="wishlist.php">Wishlist</a></li>
									<li><a href="login.php">login</a></li>
									<li><a href="register.php">Register</a></li>
								</ul>
							</li>
							<li><a href="#">about us </a></li>
							<li><a href="shop.php">shop</a> </li>
							</li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
		<!-- header bottom area end -->


	</div>
	<!-- header middel area end -->



	</header>
	<!--Header end-->