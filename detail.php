<?php include "header.php" ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<?php
$get4Products = $products->get4Products();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	foreach ($allProducts as $value) {
		if ($value['id'] == $id) {
?>
			<!-- SECTION -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- Product main img -->
						<div class="col-md-5 col-md-push-2">
							<div id="product-main-img">
								<div class="product-preview">
									<img src="./img/<?php echo $value['image'] ?>" alt="">
								</div>

								<!-- <div class="product-preview">
									<img src="./img/product03.png" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/product06.png" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/product08.png" alt="">
								</div> -->
							</div>
						</div>
						<!-- /Product main img -->

						<!-- Product thumb imgs -->
						<div class="col-md-2  col-md-pull-5">
							<div id="product-imgs">
								<div class="product-preview">
									<img src="./img/<?php echo $value['image'] ?>" alt="">
								</div>

								<!-- <div class="product-preview">
									<img src="./img/product03.png" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/product06.png" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/product08.png" alt="">
								</div> -->
							</div>
						</div>
						<!-- /Product thumb imgs -->

						<!-- Product details -->
						<div class="col-md-5">
							<div class="product-details">
								<h2 class="product-name"><?php echo $value['name'] ?></h2>
								<div>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<a class="review-link" href="#">10 Review(s) | Add your review</a>
								</div>
								<div>
									<?php if($value['sale'] == 1 ){?>
									<h3 class="product-price"><?php echo number_format($value['price'] * 90 / 100) ?> VND <del class="product-old-price"><?php echo number_format($value['price']) ?> VND</del></h3>
									<?php } else {?>
									<h3 class="product-price"><?php echo number_format($value['price']) ?> VND</h3>
									<?php } ?>
									<span class="product-available">In Stock</span>
								</div>
								<p><?php echo $value['description'] ?></p>

								<!-- <div class="product-options">
									<label>
										Size
										<select class="input-select">
											<option value="0">X</option>
										</select>
									</label>
									<label>
										Color
										<select class="input-select">
											<option value="0">Red</option>
										</select>
									</label>
								</div> -->

								<div class="add-to-cart">
									<!-- <div class="qty-label">
										Qty
										<div class="input-number">
											<input type="number">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div> -->
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a href="<?php if (isset($_SESSION['account'])){echo "cart.php?id=".$value['id'];}else {echo "login.php";}?>">add to cart</a></button>
								</div>

								<ul class="product-btns">
									<li><a href="<?php if (isset($_SESSION['account'])){echo "addwishlist.php";} else {echo "login.php";}?>"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
									<!-- <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li> -->
								</ul>

								<ul class="product-links">
									<?php foreach ($allProtype as $type) {
										if ($value['type_id'] == $type['type_id']) {
											$relatedProtype = $type['type_id'];
									?>
											<li>Category:</li>

											<li><a href="store.php?typeid=<?php echo $type['type_id'] ?>"><?php echo $type['type_name'] ?></a></li>

									<?php }
									} ?>
								</ul>

								<ul class="product-links">
									<li>Share:</li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-envelope"></i></a></li>
								</ul>

							</div>
						</div>
						<!-- /Product details -->

						<!-- Product tab -->
						<div class="col-md-12">
							<div id="product-tab">
								<!-- product tab nav -->
								<ul class="tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
									<li><a data-toggle="tab" href="#tab2">Details</a></li>
									<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
								</ul>
								<!-- /product tab nav -->

								<!-- product tab content -->
								<div class="tab-content">
									<!-- tab1  -->
									<div id="tab1" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-12">
												<p><?php echo $value['description'] ?></p>
											</div>
										</div>
									</div>
									<!-- /tab1  -->

									<!-- tab2  -->
									<div id="tab2" class="tab-pane fade in">
										<div class="row">
											<div class="col-md-12">
												<?php if ($value['type_id'] == 1) { ?>
													<table class="table table-sm ">
														<tr>
															<th>DISPLAY</th>
															<td><?php echo $value['display'] ?></td>
														</tr>
														<tr>
															<th>CHIP</th>
															<td><?php echo $value['chip'] ?></td>
														</tr>
														<tr>
															<th>RAM</th>
															<td><?php echo $value['ram'] ?></td>
														</tr>
														<tr>
															<th>ROM</th>
															<td><?php echo $value['rom'] ?></td>
														</tr>
														<tr>
															<th>BATTERY</th>
															<td><?php echo $value['battery'] ?></td>
														</tr>
														<tr>
															<th>WEIGHT</th>
															<td><?php echo $value['weight'] ?></td>
														</tr>
													</table>

												<?php } ?>
												<?php if ($value['type_id'] == 2) { ?>
													<table class="table table-sm ">
														<tr>
															<th>DISPLAY</th>
															<td><?php echo $value['display'] ?></td>
														</tr>
														<tr>
															<th>CHIP</th>
															<td><?php echo $value['chip'] ?></td>
														</tr>
														<tr>
															<th>RAM</th>
															<td><?php echo $value['ram'] ?></td>
														</tr>
														<tr>
															<th>BATTERY</th>
															<td><?php echo $value['battery'] ?></td>
														</tr>
														<tr>
															<th>CONNECTION</th>
															<td><?php echo $value['connection'] ?></td>
														</tr>
														<tr>
															<th>BATTERY</th>
															<td><?php echo $value['battery'] ?></td>
														</tr>
														<tr>
															<th>WEIGHT</th>
															<td><?php echo $value['weight'] ?></td>
														</tr>
													</table>
												<?php } ?>
												<?php if ($value['type_id'] == 3) { ?>
													<table class="table table-sm ">
														<tr>
															<th>BATTERY</th>
															<td><?php echo $value['battery'] ?></td>
														</tr>
														<tr>
															<th>CONNECTION</th>
															<td><?php echo $value['connection'] ?></td>
														</tr>
														<tr>
															<th>BATTERY</th>
															<td><?php echo $value['battery'] ?></td>
														</tr>
														<tr>
															<th>WEIGHT</th>
															<td><?php echo $value['weight'] ?></td>
														</tr>
													</table>
												<?php } ?>
												<?php if ($value['type_id'] == 4) { ?>
													<table class="table table-sm ">
														<tr>
															<th>DISPLAY</th>
															<td><?php echo $value['display'] ?></td>
														</tr>	
														<tr>
															<th>CONNECTION</th>
															<td><?php echo $value['connection'] ?></td>
														</tr>
														<tr>
															<th>WEIGHT</th>
															<td><?php echo $value['weight'] ?></td>
														</tr>
													</table>
												<?php } ?>
												<?php if ($value['type_id'] == 5) { ?>
													<table class="table table-sm ">
														<tr>
															<th>MODELS</th>
															<td><?php echo $value['models'] ?></td>
														</tr>
														<tr>
															<th>KEYSWITCH</th>
															<td><?php echo $value['keyswitch'] ?></td>
														</tr>	
														<tr>
															<th>CONNECTION</th>
															<td><?php echo $value['connection'] ?></td>
														</tr>
														<tr>
															<th>WEIGHT</th>
															<td><?php echo $value['weight'] ?></td>
														</tr>
													</table>
												<?php } ?>
											</div>
										</div>
									</div>
									<!-- /tab2  -->

									<!-- tab3  -->
									<div id="tab3" class="tab-pane fade in">
										<div class="row">
											<!-- Rating -->
											<div class="col-md-3">
												<div id="rating">
													<div class="rating-avg">
														<span>4.5</span>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
													</div>
													<ul class="rating">
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 80%;"></div>
															</div>
															<span class="sum">3</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 60%;"></div>
															</div>
															<span class="sum">2</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div></div>
															</div>
															<span class="sum">0</span>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Rating -->

											<!-- Reviews -->
											<div class="col-md-6">
												<div id="reviews">
													<ul class="reviews">
														<li>
															<div class="review-heading">
																<h5 class="name">John</h5>
																<p class="date">27 DEC 2018, 8:0 PM</p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o empty"></i>
																</div>
															</div>
															<div class="review-body">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
															</div>
														</li>
														<li>
															<div class="review-heading">
																<h5 class="name">John</h5>
																<p class="date">27 DEC 2018, 8:0 PM</p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o empty"></i>
																</div>
															</div>
															<div class="review-body">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
															</div>
														</li>
														<li>
															<div class="review-heading">
																<h5 class="name">John</h5>
																<p class="date">27 DEC 2018, 8:0 PM</p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o empty"></i>
																</div>
															</div>
															<div class="review-body">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
															</div>
														</li>
													</ul>
													<ul class="reviews-pagination">
														<li class="active">1</li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#">4</a></li>
														<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
													</ul>
												</div>
											</div>
											<!-- /Reviews -->

											<!-- Review Form -->
											<div class="col-md-3">
												<div id="review-form">
													<form class="review-form">
														<input class="input" type="text" placeholder="Your Name">
														<input class="input" type="email" placeholder="Your Email">
														<textarea class="input" placeholder="Your Review"></textarea>
														<div class="input-rating">
															<span>Your Rating: </span>
															<div class="stars">
																<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
																<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
															</div>
														</div>
														<button class="primary-btn">Submit</button>
													</form>
												</div>
											</div>
											<!-- /Review Form -->
										</div>
									</div>
									<!-- /tab3  -->
								</div>
								<!-- /product tab content  -->
							</div>
						</div>
						<!-- /product tab -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

			<!-- Section -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<div class="col-md-12">
							<div class="section-title text-center">
								<h3 class="title">Related Products</h3>
							</div>
						</div>
						<?php
						$relatedProducts = $products->getRelatedProducts($relatedProtype);
						?>
						<!-- product -->
						<?php foreach ($relatedProducts as $value1) { ?>
							<div class="col-md-3 col-xs-6">

								<div class="product">
								<div class="product-img">
                                            <img style="height: 200px;" src="./img/<?php echo $value1['image'] ?>" alt="">
                                            <div class="product-label">
                                                <?php if ($value1['sale'] == 1) { ?>
                                                    <span class="sale">-30%</span>
                                                <?php } ?>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <!-- <p class="product-category"> <?php echo $valueProtype['type_name'] ?></p> -->
                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></a></h3>
                                            <?php if ($value1['sale'] == 1) { ?>
                                                <h4 class="product-price"><?php echo number_format($value1['price'] * 90 / 100) ?> VND </h4>
                                            <?php } else { ?>
                                                <h4 class="product-price"><?php echo number_format($value1['price']) ?> VND </h4>
                                            <?php } ?>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><a href="wishlist.php?id=<?php echo $value1['id'] ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <button class="quick-view"><a href="detail.php?id=<?php echo $value1['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><a href="cart.php?id=<?php echo $value1['id'] ?>"><i class="fa fa-shopping-cart"></i> add to cart </a></button>
									</div>
								</div>

							</div>
						<?php } ?>
						<!-- /product -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /Section -->

<?php }
	}
}  ?>

<?php include "footer.php" ?>