<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/order.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <?php
	require "config.php";
	require "models/db.php";
	require "models/products.php";
	require "models/protype.php";
	require "models/manufactures.php";
	$products = new Products;
	$protype = new Protype;
	$manufactures = new Manufactures();
	$allProducts = $products->getAllProducts();
	$arr3Products = $products->get3Products();
	$hotdeals = $products->getHotDeals();
	$allProtype = $protype->getAllProtype();
	$allManufactures = $manufactures->getAllMaunufactures();
	$total = 0;
	$qty = 0;
    $qtyWishList = 0;
	if (isset($_SESSION['account'])){
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $value) {
				$qty = $qty + $value;
			}
		}
	}
    if (isset($_SESSION['wishlist'])){
		if (isset($_SESSION['wishlist'])) {
			foreach ($_SESSION['wishlist'] as $key => $value) {
				$qtyWishList = $qtyWishList + $value;
			}
		}
	}
	if (isset($_GET['typeid'])) {
		$productByProtype = $products->getProductByProtype($_GET['typeid']);
		}
	?>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> nhom5@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> FIT-TDC</a></li>
                </ul>
                <ul class="header-links pull-right">                   
                    <li><a href="<?php if (isset($_SESSION['account'])){
						echo "order.php";
						}
						else{
							echo "login.php";
						}?>"><i class="fa fa-user-o"></i><?php if (isset($_SESSION['account'])){
							echo "My Account";
							?>
							<li><a href="logoutProcess.php">Log out</a></li>
							<?php
							}
							else{
								echo "Log in";
							}?></a></li>
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
                            <form action="result.php" method="get">
                                <select class="input-select" name="categori">
                                    <option value="0">All Categories</option>
                                    <?php foreach ($allProtype as $value) { ?>
                                    <option value="<?php echo $value['type_id']?>"> <?php echo $value['type_name'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <input class="input" name="keyword" placeholder="Search here">
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="<?php if (isset($_SESSION['account'])){echo "addwishlist.php";} else {echo "login.php";}?>">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty"><?php echo $qtyWishList?></div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty"><?php echo $qty ?></div>
                                </a>
                                <div class="cart-dropdown">
                                    <?php
									
									if (isset($_SESSION['cart'])) { ?>
                                    <div class="cart-list">
                                        <?php
											foreach ($_SESSION['cart'] as $key => $value) {
												foreach ($allProducts as $p) {
													if ($p['id'] == $key) {
														$total = $total + $p['price'];
														$qty = $qty + $value;
											?>
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img style="height: 50px; width: 50px;"
                                                    src="./img/<?php echo $p['image'] ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#"><?php echo $p['name'] ?></a></h3>
                                                <h4 class="product-price"><span class="qty"><?php echo $value ?>x
                                                    </span><?php echo number_format($p['price']) ?> VND</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <?php }
												}
											}
											?>
                                    </div>
                                    <?php } ?>
                                    <div class="cart-summary">
                                        <small><?php echo $qty ?> Item(s) selected</small>
                                        <h5>SUBTOTAL: <?php echo number_format($total) ?> VND</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="<?php if (isset($_SESSION['account'])){echo "cart.php";} else {echo "login.php";}?>">View Cart</a>
                                        <a href="<?php if (isset($_SESSION['account'])){echo "checkout.php";} else {echo "login.php";}?>">Checkout <i class="fa fa-arrow-circle-right"></i></a>
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <!-- <li><a href="store.php?typeid=-1&page=1">Hot Deals</a></li> -->
                    <li><a href="store.php?typeid=0&page=1">All Categories</a></li>
                    <!-- <?php
					foreach ($allProtype as $value) {
					?>
                    <li><a href="store.php?typeid=<?php echo $value['type_id'] ?>&page=1"><?php echo $value['type_name'] ?></a>
                    </li>
                    <?php
					}
					?> -->
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->