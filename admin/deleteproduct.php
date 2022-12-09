<?php
require "config.php";
require "models/db.php";
require "models/products.php";
$products = new Products;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products->deleteProduct($id);
    header("location:product.php");
}
