<?php
$connect = new PDO("mysql:host=localhost;dbname=nhom5", "root", "");
if(isset($_POST["action"]))
{
	$query = "
	SELECT * FROM (`products` INNER JOIN manufactures ON products.manu_id=manufactures.manu_id) INNER JOIN protypes ON products.type_id=protypes.type_id WHERE products.id<>-1
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		AND `price` BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["protype"]))
	{
		$protype_filter = implode("','", $_POST["protype"]);
  		$query .= "
		AND protypes.type_id = products.type_id AND protypes.type_name IN('".$protype_filter."')
  		";
	}
	if(isset($_POST["manufacture"]))
	{
		$manufacture_filter = implode("','", $_POST["manufacture"]);
  		$query .= "
		AND products.manu_id = manufactures.manu_id AND manufactures.manu_name IN('".$manufacture_filter."')
  		";
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $value)
		{
			$output .= '
			<div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img style="height:200px" src="./img/'.$value['image'].'" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">'.$value['type_id'].'</p>
                                <h3 class="product-name"><a
                                        href="detail.php?id='.$value['id'].'">'.$value['name'].'</a>
                                </h3>
                                <h4 class="product-price">'.number_format($value['price'] * 90 / 100).' <del
                                        class="product-old-price">'.number_format($value['price']).'</del>
                                </h4>
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
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a
                                        href="cart.php?id='.$value['id'].'">add to cart</a></button>
                            </div>
                        </div>
                    </div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>