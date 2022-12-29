<?php
include "header.php";
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Checkout</li>
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
        <form action="checkoutProcess.php" method="post">
            <div class="row">
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>

                        <div class="form-group">
                            <input class="input" type="text" name="first-name" required placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="last-name" required placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" required placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" required placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" required placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" required placeholder="Telephone">
                        </div>
                        <div class="order-notes">
                            <textarea class="input" name="ordernotes" placeholder="Order Notes"></textarea>

                        </div>
                    </div>
                    <!-- /Billing Details -->

                    <!-- Shiping Details -->
                    <div class="shiping-details">
                        <div class="section-title">

                        </div>

                    </div>
                    <!-- /Shiping Details -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <?php
                        $strProduct = "";
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                        ?>
                            <div class="order-products">
                                <?php
                                
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    foreach ($allProducts as $p) {
                                        if ($p['id'] == $key) {
                                            $total = $total + $p['price'];
                                            $strProduct .= $p['name']."\n";

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
                        <input type="hidden" name="product" value="<?php echo $strProduct?>">
                        <input type="hidden" name="total" value="<?php echo $total?>">
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">

                        </div>
                        <div class="input-radio">

                        </div>
                        <div class="input-radio">

                        </div>
                        <div class="input-checkbox">

                        </div>
                        <!-- <a href="<?php if (isset($_SESSION['cart'])) {
                                            echo 'order.php';
                                        } else {
                                            echo 'index.php';
                                        } ?>" class="primary-btn order-submit">Place order</a> -->
                        <button type="submit" class="primary-btn order-submit">Place order </button>
                    </div>
                    <!-- /Order Details -->
                </div>
        </form>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<?php
require "footer.php";
?>