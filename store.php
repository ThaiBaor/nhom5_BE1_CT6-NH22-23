<?php
require "header.php";
$countProducts;
$perPage = 6;
$page = $_GET['page'];
$url = $_SERVER['PHP_SELF'];
$offset;
$getProductsPage;
if (isset($_GET['typeid'])) {
    $qtyOfProductByProtype = $products->countByProtype($_GET['typeid']);
    if ($_GET['typeid'] == -1) {
        $countProducts = $products->countHotDeals();
        $getProductsPage = $products->getProductsPageHotDeal($page, $perPage);
        $offset = ceil($countProducts / $perPage);
    } else if ($_GET['typeid'] == 0) {
        $countProducts = $products->countAllProducts();
        $offset = ceil($countProducts / $perPage);
        $getProductsPage = $products->getProductsPage($page, $perPage);
    } else {
        $countProducts = $products->countByProtype($_GET['typeid']);
        $offset = ceil($countProducts / $perPage);
        $getProductsPage = $products->getProductsPageProtype($page, $perPage, $_GET['typeid']);
    }
} else if (isset($_GET['manuid'])) {
    $productByManu = $products->getProductByManu($_GET['manuid']);
    $qtyOfProductByManu = $products->countByManu($_GET['manuid']);
}
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <?php
                    if (isset($_GET['typeid'])) {
                        if ($_GET['typeid'] == -1) {
                    ?>
                            <li>Hot Deals (<?php echo $countProducts ?> Results)</li>
                        <?php
                        } else if ($_GET['typeid'] == 0) {
                        ?>
                            <li>All Categories (<?php echo $countProducts ?> Results)</li>
                        <?php
                        } else {
                        ?>
                            <?php
                            foreach ($allProtype as $value) {
                                if ($_GET['typeid'] == $value['type_id']) {
                            ?>
                                    <li>Categories</li>
                                    <li class="active"> <?php echo $value['type_name'] . " " ?>(<?php echo $qtyOfProductByProtype ?>
                                        Results)</li>
                                <?php
                                }
                            }
                        }
                    } else if (isset($_GET['manuid'])) {
                        foreach ($allManufactures as $value) {
                            if ($value['manu_id'] == $_GET['manuid']) {
                                ?>
                                <li class="active"> <?php echo $value['manu_name'] . " " ?>(<?php echo $qtyOfProductByManu ?> Results)
                                </li>
                    <?php
                            }
                        }
                    }
                    ?>
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
            <div id="aside" class="col-md-3">
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
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        <?php
                        foreach ($allProtype as $value) {
                        ?>
                            <div class="input-checkbox">
                                <input type="checkbox" id="<?php echo $value['type_name'] ?>">
                                <label for="<?php echo $value['type_name'] ?>">
                                    <span></span>
                                    <?php echo $value['type_name'] ?>
                                </label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- /aside Widget -->
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <?php
                        foreach ($allManufactures as $value) {
                        ?>
                            <div class="input-checkbox">
                                <input type="checkbox" id="<?php echo $value['manu_name']; ?>">
                                <label for="<?php echo $value['manu_name']; ?>">
                                    <span></span>
                                    <?php
                                    echo $value['manu_name'];
                                    ?>
                                </label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>               
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title"></h3>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->
            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                       
                    </div>
                    <ul class="store-grid">
                        
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    <?php
                    if (isset($_GET['typeid'])) {
                        if ($_GET['typeid'] == -1) {
                            foreach ($getProductsPage as $value) {
                    ?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="height:200px" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?php echo $value['type_id'] ?></p>
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                            </h3>
                                            <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> <del class="product-old-price"><?php echo number_format($value['price']) ?></del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="cart.php?id=<?php echo $value['id'] ?>">add to cart</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else if ($_GET['typeid'] == 0) {
                            foreach ($getProductsPage as $value) {
                            ?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="height:200px" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?php echo $value['type_id'] ?></p>
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                            </h3>
                                            <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> <del class="product-old-price"><?php echo number_format($value['price']) ?></del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="cart.php?id=<?php echo $value['id'] ?>">add to cart</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            $productByType = $products->getProductByProtype($_GET['typeid']);
                            foreach ($getProductsPage as $value) {
                            ?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="height:200px" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?php echo $value['type_id'] ?></p>
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                            </h3>
                                            <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> <del class="product-old-price"><?php echo number_format($value['price']) ?></del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="cart.php?id=<?php echo $value['id'] ?>">add to cart</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    } else {
                        foreach ($productByManu as $value) {
                            ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img style="height:200px" src="./img/<?php echo $value['image'] ?>" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?php echo $value['manu_id'] ?></p>
                                        <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                        </h3>
                                        <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> <del class="product-old-price"><?php echo number_format($value['price']) ?></del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="cart.php?id=<?php echo $value['id'] ?>">add to cart</a></button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <div class="clearfix visible-sm visible-xs"></div>
                    <div class="clearfix visible-lg visible-md"></div>
                    <div class="clearfix visible-sm visible-xs"></div>
                    <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
                    <div class="clearfix visible-sm visible-xs"></div>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    
                    <ul class="store-pagination">
                        <?php echo $products->paginate($url, $countProducts, $page, $perPage, $offset, $_GET['typeid']) ?>
                    </ul>
                </div>
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
require "footer.php";
?>