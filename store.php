<?php
require "header.php";
if (isset($_GET['typeid'])){
    $qtyOfProductByProtype = $products->countByProtype($_GET['typeid']);
}
else if (isset($_GET['manuid'])){
    $productByManu= $products->getProductByManu($_GET['manuid']);
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
                        if (isset($_GET['typeid'])){
                            if ($_GET['typeid']==-1){
                                    ?>
                    <li>Hot Deals (10 Results)</li>
                    <?php
                                }
                            else if ($_GET['typeid']==0){
                                    ?>
                    <li>All Categories</li>
                    <?php
                            }
                        
                        else {
                            ?>
                    <?php
                            foreach($allProtype as $value){
                                if ($_GET['typeid']==$value['type_id']){
                            ?>
                    <li>Categories</li>
                    <li class="active"> <?php echo $value['type_name']." "?>(<?php echo $qtyOfProductByProtype?> Results)</li>
                    <?php
                                }
                            }
                        }
                    }
                    else if (isset($_GET['manuid'])){
                        foreach($allManufactures as $value){
                            if ($value['manu_id']==$_GET['manuid']){
                            ?>
                            <li class="active"> <?php echo $value['manu_name']." "?>(<?php echo $qtyOfProductByManu?> Results)</li>
                            <?php
                        }
                    }}
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
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        <?php
								foreach($allProtype as $value){
								?>
                        <div class="input-checkbox">
                            <input type="checkbox" id="<?php echo $value['type_name']?>">
                            <label for="<?php echo $value['type_name']?>">
                                <span></span>
                                <?php echo $value['type_name']?>
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
								foreach($allManufactures as $value){
								?>
                        <div class="input-checkbox">
                            <input type="checkbox" id="<?php echo $value['manu_name'];?>">
                            <label for="<?php echo $value['manu_name'];?>">
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
                        <label>
                            Sort By:
                            <select class="input-select" name="sort">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    <?php
                    if (isset($_GET['typeid'])){
							if ($_GET['typeid']==-1){
								foreach ($hotdeals as $value){
									?>
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img style="height:200px" src="./img/<?php echo $value['image']?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $value['type_id']?></p>
                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']?></a></h3>
                                <h4 class="product-price"><?php echo number_format($value['price']*90/100)?> <del
                                        class="product-old-price"><?php echo number_format($value['price'])?></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <?php
								}}
							else if ($_GET['typeid']==0){
								foreach ($allProducts as $value){
									?>
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img style="height:200px" src="./img/<?php echo $value['image']?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $value['type_id']?></p>
                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']?></a></h3>
                                <h4 class="product-price"><?php echo number_format($value['price']*90/100)?> <del
                                        class="product-old-price"><?php echo number_format($value['price'])?></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <?php
								}
							}
								else{
							$productByType = $products -> getProductByProtype($_GET['typeid']);
							foreach ($productByType as $value){
								?>
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img style="height:200px" src="./img/<?php echo $value['image']?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $value['type_id']?></p>
                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']?></a></h3>
                                <h4 class="product-price"><?php echo number_format($value['price']*90/100)?> <del
                                        class="product-old-price"><?php echo number_format($value['price'])?></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <?php
							}}}
                            else{
                                foreach($productByManu as $value){
                                    ?>
                                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img style="height:200px" src="./img/<?php echo $value['image']?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $value['manu_id']?></p>
                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']?></a></h3>
                                <h4 class="product-price"><?php echo number_format($value['price']*90/100)?> <del
                                        class="product-old-price"><?php echo number_format($value['price'])?></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
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
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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