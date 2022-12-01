<?php
include "header.php";
$newProducts = $products->getNewProducts();
$hotdealsLapTop = $products->getHotDealsByTypeId(2);
$hotdealsLapTopNext = $products->getHotDealsByTypeIdNext(2);
$hotdealsMobile = $products->getHotDealsByTypeId(1);
$hotdealsMobileNext = $products->getHotDealsByTypeIdNext(2);
$hotdealsHeadPhone = $products->getHotDealsByTypeId(3);
$hotdealsHeadPhoneNext = $products->getHotDealsByTypeIdNext(3);
?>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop01.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Laptop<br>Collection</h3>
						<a href="store.php?typeid=2&page=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop03.png" alt="">
					</div>
					<div class="shop-body">
						<h3>HeadPhone<br>Collection</h3>
						<a href="store.php?typeid=3&page=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/phonesony.jpg" alt="" style="height: 241px;">
					</div>
					<div class="shop-body">
						<h3>Mobile Phone<br>Collection</h3>
						<a href="store.php?typeid=1&page=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">New Products</h3>
					<div class="section-nav">
						
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<!-- product -->
								<?php
								foreach ($newProducts as $value) {
									foreach ($allProtype as $valueProtype) {
										if ($value['type_id'] == $valueProtype['type_id']) {
								?>
											<div class="product">
												<div class="product-img">
													<img style="height: 200px;" src="./img/<?php echo $value['image'] ?>" alt="">
													<div class="product-label">
														<?php if($value['sale'] == 1){?>
														<span class="sale">-30%</span>
														<?php } ?>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"> <?php echo $valueProtype['type_name'] ?></p>
													<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
													<?php if($value['sale'] == 1){?>
													<h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND </h4>
													<?php } else{?>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="<?php if (isset($_SESSION['account'])){echo "cart.php?id=".$value['id'];} else {echo "login.php";}?>">add to cart</a></button>
												</div>
											</div>
								<?php }
									}
								} ?>
								<!-- /product -->
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown">
						<li>
							<div>
								<h3>02</h3>
								<span>Days</span>
							</div>
						</li>
						<li>
							<div>
								<h3>10</h3>
								<span>Hours</span>
							</div>
						</li>
						<li>
							<div>
								<h3>34</h3>
								<span>Mins</span>
							</div>
						</li>
						<li>
							<div>
								<h3>60</h3>
								<span>Secs</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">hot deal this week</h2>
					<p>New Collection Up to 50% OFF</p>
					<a class="primary-btn cta-btn" href="store.php?page=1&typeid=0">Shop now</a>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Top selling</h3>
					<div class="section-nav">
						
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<?php
								foreach ($hotdeals as $value) {
									foreach ($allProtype as $valueProtype) {
										if ($value['type_id'] == $valueProtype['type_id']) {
								?>
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img style="height: 200px;" src="./img/<?php echo $value['image'] ?>" alt="">
													<div class="product-label">
														<?php if($value['sale'] == 1){?>
														<span class="sale">-30%</span>
														<?php } ?>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"> <?php echo $valueProtype['type_name'] ?></p>
													<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
													<?php if($value['sale'] == 1){?>
													<h4 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND </h4>
													<?php } else{?>
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
														<button class="add-to-wishlist"><a href="wishlist.php?id=<?php echo $value['id']?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
														<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
														<button class="quick-view"><a href="detail.php?id=<?php echo $value['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="<?php if (isset($_SESSION['account'])){echo "cart.php?id=".$value['id'];} else {echo "login.php";}?>">add to cart</a></button>
												</div>
											</div>
								<?php }
									}
								} ?>
								<!-- /product -->


							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling Laptop</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-3">
					<div>
						<?php
						foreach ($hotdealsLapTop as $value) {
							foreach ($allProtype as $valueProtype) {
								if ($value['type_id'] == $valueProtype['type_id']) {
						?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $valueProtype['type_name'] ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
										</div>
									</div>
									<!-- /product widget -->
						<?php }
							}
						} ?>
					</div>

					<div>
						<?php
						foreach ($hotdealsLapTopNext as $value) {
							foreach ($allProtype as $valueProtype) {
								if ($value['type_id'] == $valueProtype['type_id']) {
						?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $valueProtype['type_name'] ?></p>
											<h3 class="product-name"><a href="detail.php"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
										</div>
									</div>
									<!-- /product widget -->
						<?php }
							}
						} ?>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling Mobile</h4>
					<div class="section-nav">
						<div id="slick-nav-4" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-4">
					<div>
						<?php
						foreach ($hotdealsMobile as $value) {
							foreach ($allProtype as $valueProtype) {
								if ($value['type_id'] == $valueProtype['type_id']) {
						?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $valueProtype['type_name'] ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
										</div>
									</div>
									<!-- /product widget -->
						<?php }
							}
						} ?>
					</div>

					<div>
						<?php
						foreach ($hotdealsMobileNext as $value) {
							foreach ($allProtype as $valueProtype) {
								if ($value['type_id'] == $valueProtype['type_id']) {
						?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $valueProtype['type_name'] ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
										</div>
									</div>
									<!-- /product widget -->
						<?php }
							}
						} ?>
					</div>
				</div>
			</div>

			<div class="clearfix visible-sm visible-xs"></div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling Headphone</h4>
					<div class="section-nav">
						<div id="slick-nav-5" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-5">
					<div>
						<?php
						foreach ($hotdealsHeadPhone as $value) {
							foreach ($allProtype as $valueProtype) {
								if ($value['type_id'] == $valueProtype['type_id']) {
						?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $valueProtype['type_name'] ?></p>
											<h3 class="product-name"><a href="detail.php"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
										</div>
									</div>
									<!-- /product widget -->
						<?php }
							}
						} ?>
					</div>

					<div>
						<?php
						foreach ($hotdealsHeadPhoneNext as $value) {
							foreach ($allProtype as $valueProtype) {
								if ($value['type_id'] == $valueProtype['type_id']) {
						?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $valueProtype['type_name'] ?></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND </h4>
										</div>
									</div>
									<!-- /product widget -->
						<?php }
							}
						} ?>
					</div>
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<?php
require "footer.php";
?>