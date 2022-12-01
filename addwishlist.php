<?php 
include "header.php";
$resultWishlist = 0;
if(isset($_SESSION['wishlist'])){
foreach($_SESSION['wishlist'] as $key => $value){
	$resultWishlist++;
	}
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
							<li class="active">Wishlist (<?php echo $resultWishlist ?> Results)</li>
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
					

					<!-- STORE -->
					<div id="store" class="col-md-12">
						<!-- store products -->
						<div class="row">
							<?php if(isset($_SESSION['wishlist'])){
								foreach($_SESSION['wishlist'] as $key => $value){
									foreach($allProducts as $p){
										if($p['id'] == $key){
								?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img style="height: 250px;" src="./img/<?php echo $p['image'] ?>" alt="">
										<div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#"><?php echo $p['name'] ?></a></h3>
										<h4 class="product-price"><?php echo $p['price'] ?> <del class="product-old-price">$990.00</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><a href="deletewishlist.php?id=<?php echo $p['id']?>"><i class="fa fa-heart-o"></a></i><span class="tooltipp">add to wishlist</span></button>
											<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
											<button class="quick-view"><a href="detail.php?id=<?php echo $p['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
							<?php } } } } ?>
							<!-- /product -->
							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<!-- <div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div> -->
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->