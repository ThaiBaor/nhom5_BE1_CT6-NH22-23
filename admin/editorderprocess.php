<?php
require "config.php";
require "models/db.php";
require "models/order.php";
$order = new Order;
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city= $_POST['city'];
    $country = $_POST['country'];
    $phone= $_POST['phone'];
    $ordernotes = $_POST['ordernote'];
    $product = $_POST['product'];
    $total = $_POST['total'];

    $order->editOrder($id,$firstname, $lastname, $email, $address, $city, $country, $phone, $ordernotes, $product, $total);
    header("location:order.php");
}
    
?>