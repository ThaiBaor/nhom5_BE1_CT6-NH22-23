<?php
require "header.php";
$qtyOfSearchProducts;
$perPage = 6;
$page;
$offset;
$qtyOfSearchProductsAllType=$products->countSearchAllProducts($_GET['keyword']);
$getKey = $_GET['keyword'];
$getCategori = $_GET['categori'];
if($getCategori == 0){
    $qtyOfSearchProductsAllType=$products->countSearchAllProducts($_GET['keyword']);;
}
else{
    $qtyOfSearchProductsAllType= $products->countSearchProducts($_GET['keyword'], $_GET['categori']);
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $offset = ceil($qtyOfSearchProductsAllType / $perPage);
}
else{
    $page = 1;
    $offset = ceil($qtyOfSearchProductsAllType / $perPage);
}
$url = $_SERVER['PHP_SELF'];


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
                        if (isset($_GET['categori'])){

                            
                            if ($_GET['categori']==0){
                                $qtyOfSearchProductsAllType=$products->countSearchAllProducts($_GET['keyword']);
                                    ?>
                    <li>All Categories (<?php echo $qtyOfSearchProductsAllType?> Results)</li>
                    <?php
                            }
                        else {
                            ?>
                    <?php
                            foreach($allProtype as $value){
                                if ($_GET['categori']==$value['type_id']){
                            ?>
                    <li>Categories</li>
                    <li class="active"> <?php echo $value['type_name']." "?>(<?php echo $qtyOfSearchProductsAllType?> Results)</li>
                    <?php
                                }
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
            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        
                    </div>
                    <ul class="store-grid">
                        
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <!-- <div class="row filter_data"> -->
                    <!-- product -->
                    <?php
                            if (isset($_GET['keyword']) && isset($_GET['categori'])){
                                $product2=new Products();
                                if ($_GET['categori']==0){
                                    $productsSearch= $product2->getProductsPageSreachAll($page,$perPage,$_GET['keyword']);
                                }
                                else{
                                    $productsSearch= $product2->getProductsPageSreach($page,$perPage,$getKey,$getCategori)  ;
                                }
                                foreach ($productsSearch as $value){
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
                <!-- </div> -->
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    
                    <ul class="store-pagination">
                        <?php echo $products->paginateSreach($url, $qtyOfSearchProductsAllType, $page, $perPage, $offset,$getKey,$getCategori) ?>
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