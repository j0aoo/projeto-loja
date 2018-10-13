<?php

	 include("admin/config.php");
	 session_start();

?>
<?php 

	//carrinho
	if (!isset($_SESSION['carrinho'])) {

		$_SESSION['carrinho']= array();

	}

	if (isset($_GET['userExit'])) {
		
		unset($_SESSION['userLog']);
		echo "<script> location.href='index.php' </script>";

	}

	if (isset($_GET['acao'])) {

		$id = $_GET['id'];

		if ($_GET['acao'] == "add") {

		if (!isset($_SESSION['carrinho'][$_GET['id']])) {

				$_SESSION['carrinho'][$id] = 1;	

			} else {

				$_SESSION['carrinho'][$id] += 1;
			
			}
			
		}
		
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						fashe@example.com
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Home</a>
								<ul class="sub_menu">
									<li><a href="index.php">Homepage V1</a></li>
									<li><a href="home-02.html">Homepage V2</a></li>
									<li><a href="home-03.html">Homepage V3</a></li>
								</ul>
							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>

							<li class="sale-noti">
								<a href="product.php">Sale</a>
							</li>

							<li>
								<a href="cart.php">Features</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li>

							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block">
						<?php

							if (isset($_SESSION['userLog'])) {
								
								echo '

									<ul class="nav nav-tabs" style="margin-top: -20%">
									  	<li class="nav-item dropdown">
									    	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON"></a>
									    <div class="dropdown-menu">
									      
									      	<a class="dropdown-item" href="minhaConta.php?user='.$_SESSION['userLog'].'">Minha conta</a>
									      	<a class="dropdown-item" href="minhaConta.php?userExit=0">Sair</a>
																    
									    </div>  
									  	</li>
									</ul>

								';

							} else {

								echo '

									<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">

								';

							}

						?>

					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo count($_SESSION['carrinho']); ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php 
									
									//carrinho

									$total = 0;
									
									foreach ($_SESSION['carrinho'] as $id => $qnt) {
										
										$sqlProdCar = "SELECT * FROM produtos WHERE produtos.id = '".$id."'";
										$queryProdCar = mysqli_query($conexao, $sqlProdCar);
										$productCar = mysqli_fetch_assoc($queryProdCar);

										$sqlProdCarImg = "SELECT * FROM img_produto WHERE id_produto = '".$id."'";
										$queryProdCarImg = mysqli_query($conexao, $sqlProdCarImg);
										$imgProduct = mysqli_fetch_assoc($queryProdCarImg);
										
											echo  '
										
												<li class="header-cart-item">
												
													<div class="header-cart-item-img">
														
														<img src ="admin/img/'.$imgProduct['nome'].'" alt="IMG"n style="height:100px">
														
													</div>
													<div class="header-cart-item-txt">
														
														<a href="#" class="header-cart-item-name">
															'.$productCar['nome'].'
														</a>
													
														<span class="header-cart-item-info">
															'.$qnt. 'x'.$productCar['preco'].'
														</span>
													
													</div>
												</li>

											';
										
										$total += $qnt * $productCar['preco'];
									
									}
									
								?>

							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(image/Moda5.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							
							<li class='p-b-9'>
								<a href='?filtroCat=todos' class='s-text7'>Todos</a>
							</li>

							<?php

								$sql = "SELECT * FROM categoria"; 
								$query = mysqli_query($conexao, $sql);

								while ($reg = mysqli_fetch_assoc($query)) {
									
									echo "
										<li class='p-b-9'>
											<a href='?filtroCat=".$reg['nome']."' class='s-text7'>
												".$reg['nome']."
											</a>
										</li>
									";

								}

							?>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">

							<ul class="nav nav-tabs">
							  	<li class="nav-item dropdown">
							    	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Default Sorting</a>
							    <div class="dropdown-menu">
							      
							      	<a class="dropdown-item" href="?filtroSorting=0">Todos</a>
							        <a class="dropdown-item" href="?filtroSorting=1">Popularity</a>
							        <a class="dropdown-item" href="?filtroSorting=2">Price: low to high</a>
							        <a class="dropdown-item" href="?filtroSorting=3">Price: high to low</a>
							    
							    </div>  
							  	</li>
							</ul>

							<ul class="nav nav-tabs">
							  	<li class="nav-item dropdown">
							    	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Price</a>
							    <div class="dropdown-menu">
							      
							      	<a class="dropdown-item" href="?filtroPreco=0">Todos</a>
							        <a class="dropdown-item" href="?filtroPreco=1">$0.00 - $50.00</a>
							        <a class="dropdown-item" href="?filtroPreco=2">$50.00 - $100.00</a>
							        <a class="dropdown-item" href="?filtroPreco=3">$100.00 - $200.00</a>
							        <a class="dropdown-item" href="?filtroPreco=4">$200.00+</a>
							    
							    </div>  
							  	</li>
							</ul>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

					<!-- Product -->
					<div class="row">						

							<?php

								//Paginação
								$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
								$limite = 6;
								
								$sqlT = "SELECT * FROM produtos";
								$queryT= mysqli_query($conexao, $sqlT);
								$total = mysqli_num_rows($queryT);
								
								$numPagina = ceil($total/$limite);
								$inicio = $pagina - 1;
								
								$inicio = ($inicio*$numPagina);

								//product
								$limit = mysqli_query($conexao, "SELECT * FROM produtos");
								$line = mysqli_num_rows($limit);

								$sqlSelecionaProd = "";

								if (isset($_GET['filtroPreco'])) {
									$filtroPreco = (int) $_GET['filtroPreco'];

									if ($filtroPreco == 1) {
									
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos WHERE preco > 0 AND preco <= 50 LIMIT $line";
									
									}

									if ($filtroPreco == 2) {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos WHERE preco > 50 AND preco <= 100 LIMIT $line";

									}
								
									if ($filtroPreco == 3) {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos WHERE preco > 100 AND preco <= 200 LIMIT $line";

									}

									if ($filtroPreco == 4) {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos WHERE preco > 200 LIMIT $line";

									}

									if ($filtroPreco == 0) {

										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos LIMIT $inicio, $limite";
									
									}

								} else if (isset($_GET['filtroSorting'])) {
									
									$filtroSorting = (int) $_GET['filtroSorting'];

									if ($filtroSorting == 1) {

										$sqlPopularity = "SELECT AVG(view) FROM p_loja.produtos LIMIT $line";
										$queryPopularity = mysqli_query($conexao, $sqlPopularity);

										$val = mysqli_fetch_row($queryPopularity);
										$media = $val[0];
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos WHERE view > $media LIMIT $line";
									
									}

									if ($filtroSorting == 2) {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos ORDER BY preco ASC LIMIT $line";

									}

									if ($filtroSorting == 3) {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos ORDER BY preco DESC LIMIT $line";

									}

									if ($filtroSorting == 0) {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos LIMIT $inicio, $limite";

									}

								} else if (isset($_GET['filtroCat'])) {
									
									$filtroCat = (string) $_GET['filtroCat'];
									if ($filtroCat == "todos") {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos LIMIT $inicio, $limite";

									}
									
									if ($filtroCat != "todos") {
										
										$sqlSelecionaProd = "SELECT * FROM p_loja.produtos WHERE cat = '".$filtroCat."' LIMIT $line";

									}

								} else {

									$sqlSelecionaProd = "SELECT * FROM p_loja.produtos LIMIT $inicio, $limite";

								}

								
								$querySelecionaProd = mysqli_query($conexao, $sqlSelecionaProd);
								while ($produtos = mysqli_fetch_row($querySelecionaProd)) {

								$queryImg = mysqli_query($conexao, "SELECT * FROM img_produto WHERE id_produto = '".$produtos[0]."'");
								$img = mysqli_fetch_assoc($queryImg);

									
									echo '
									<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
									<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
												<img src="admin/img/'.$img['nome'].'" alt="IMG-PRODUCT" style="width:250px;height:340px">

												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
														<a href="?acao=add&id='.$produtos[0].'" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
															Add to Cart
														</a>
													</div>
												</div>
											</div>
											<div class="block2-txt p-t-20">
												<a href="product-detail.php?codP='.$produtos[0].'" class="block2-name dis-block s-text3 p-b-5">
													'.$produtos[2].'
												</a>

												<span class="block2-price m-text6 p-r-5">
													$'.$produtos[3].'
												</span>
											</div>
										</div>
									</div>
								
								';

								}

							?>
					</div>
					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
					<?php 
						for ($i=1; $i <= $numPagina ; $i++) {
							if (isset($_GET['pagina']) == $i) { 
								echo '<a href="?pagina='.$i.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
							} else {
								echo '<a href="?pagina='.$i.'" class="item-pagination flex-c-m trans-0-4">'.$i.'</a>';
							}
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
