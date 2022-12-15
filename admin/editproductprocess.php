<?php
require "config.php";
require "models/db.php";
require "models/products.php";
$products = new Products;
if (isset($_POST['name'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $desc = $_POST['description'];
    $sold= $_POST['sold'];
    $instock = $_POST['instock'];
    $feature= isset($_POST['feature'])?1:0;
    $onsale= isset($_POST['onsale'])?1:0;
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $newProduct = $products->editProduct($id,$name, $type_id, $manu_id, $image, $price, $desc, $sold ,$instock, $feature, $onsale);

    $target_dir = "./img/";
    $target_file = $target_dir.basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $target_dir = "../img/";
    $target_file = $target_dir.basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header("location:product.php");
}