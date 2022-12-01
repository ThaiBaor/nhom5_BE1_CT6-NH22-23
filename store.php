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
                                <li class="active"> <?php echo $value['manu_name'] . " " ?>(<?php echo $qtyOfProductByManu ?>
                                    Results)
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
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show"><?php echo number_format(100000)." - ". number_format(100000000)?></p>
                    <div id="price_range"></div>
                </div>
                <div class="list-group">
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
                                <input type="checkbox" class="common_selector protype" id="<?php echo $value['type_name'] ?>" value="<?php echo $value['type_name'] ?>">
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
                                <input type="checkbox" class="common_selector manufacture" id="<?php echo $value['manu_name']; ?>" value="<?php echo $value['manu_name'] ?>">
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
                <div class="row filter_data">
                    <!-- product -->
                    <?php
                    if (isset($_GET['typeid'])) {
                        if ($_GET['typeid'] == -1) {
                            foreach ($getProductsPage as $value) {
                    ?>
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="height: 200px;" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($value['sale'] == 1) { ?>
                                                    <span class="sale">-30%</span>
                                                <?php } ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <!-- <p class="product-category"> <?php echo $valueProtype['type_name'] ?></p> -->
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
                                            <?php if ($value['sale'] == 1) { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND </h4>
                                            <?php } else { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
                                            <?php } ?>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href=" <?php if (isset($_SESSION['account'])){echo "wishlist.php?id=".$value['id'];}else { echo "login.php";}?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <button class="quick-view"><a href="detail.php?id=<?php echo $value['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="<?php if (isset($_SESSION['account'])) {
                                                                                                                            echo "cart.php?id=" . $value['id'];
                                                                                                                        } else {
                                                                                                                            echo "login.php";
                                                                                                                        } ?>">add to cart</a></button>
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
                                            <img style="height: 200px;" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($value['sale'] == 1) { ?>
                                                    <span class="sale">-30%</span>
                                                <?php } ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <!-- <p class="product-category"> <?php echo $valueProtype['type_name'] ?></p> -->
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
                                            <?php if ($value['sale'] == 1) { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND </h4>
                                            <?php } else { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
                                            <?php } ?>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href=" <?php if (isset($_SESSION['account'])){echo "wishlist.php?id=".$value['id'];}else { echo "login.php";}?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <button class="quick-view"><a href="detail.php?id=<?php echo $value['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="<?php if (isset($_SESSION['account'])) {
                                                                                                                            echo "cart.php?id=" . $value['id'];
                                                                                                                        } else {
                                                                                                                            echo "login.php";
                                                                                                                        } ?>">add to cart</a></button>
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
                                            <img style="height: 200px;" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($value['sale'] == 1) { ?>
                                                    <span class="sale">-30%</span>
                                                <?php } ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <!-- <p class="product-category"> <?php echo $valueProtype['type_name'] ?></p> -->
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
                                            <?php if ($value['sale'] == 1) { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND </h4>
                                            <?php } else { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
                                            <?php } ?>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href=" <?php if (isset($_SESSION['account'])){echo "wishlist.php?id=".$value['id'];}else { echo "login.php";}?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <button class="quick-view"><a href="detail.php?id=<?php echo $value['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="<?php if (isset($_SESSION['account'])) {
                                                                                                                            echo "cart.php?id=" . $value['id'];
                                                                                                                        } else {
                                                                                                                            echo "login.php";
                                                                                                                        } ?>">add to cart</a></button>
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
                                            <img style="height: 200px;" src="./img/<?php echo $value['image'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($value['sale'] == 1) { ?>
                                                    <span class="sale">-30%</span>
                                                <?php } ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <!-- <p class="product-category"> <?php echo $valueProtype['type_name'] ?></p> -->
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
                                            <?php if ($value['sale'] == 1) { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND </h4>
                                            <?php } else { ?>
                                                <h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
                                            <?php } ?>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href=" <?php if (isset($_SESSION['account'])){echo "wishlist.php?id=".$value['id'];}else { echo "login.php";}?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <button class="quick-view"><a href="detail.php?id=<?php echo $value['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="<?php if (isset($_SESSION['account'])) {
                                                                                                                        echo "cart.php?id=" . $value['id'];
                                                                                                                    } else {
                                                                                                                        echo "login.php";
                                                                                                                    } ?>">add to cart</a></button>
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