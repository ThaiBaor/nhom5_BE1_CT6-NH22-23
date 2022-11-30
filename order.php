<?php 
require "header.php"?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-5 order-details">
            <div class="section-title text-center" style="top:50px;">
                <h3 class="title">Your Order</h3>
            </div>
            <div class="order-summary">
                <div class="order-col">
                    <div><strong>PRODUCT</strong></div>
                    <div><strong>TOTAL</strong></div>
                </div>
                <?php
						if (isset($_SESSION['cart'])) {
						?>
                <div class="order-products">
                    <?php
								$total = 0;
								foreach ($_SESSION['cart'] as $key => $value) {
									foreach ($allProducts as $p) {
										if ($p['id'] == $key) {
											$total = $total + $p['price'];

								?>
                    <div class="order-col">
                        <div><?php echo $value ?>x <?php echo $p['name'] ?></div>
                        <div><?php echo number_format($p['price']) ?> VND</div>
                    </div>
                    <?php
										}
									}
								}
								?>
                </div>
                <div class="order-col">
                    <div>Shiping</div>
                    <div><strong>FREE</strong></div>
                </div>
                <div class="order-col">
                    <div><strong>TOTAL</strong></div>
                    <div><strong class="order-total"><?php echo number_format($total) ?> VND</strong></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php 
unset($_SESSION['cart']);
require "footer.php"?>