<?php
session_start();
require "config.php";
require "models/db.php";
require "models/order.php";
$order = new Order;
if (isset($_POST['first-name'])){
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city= $_POST['city'];
    $username = $_SESSION['account'];
    $phone= $_POST['tel'];
    $ordernotes = $_POST['ordernotes'];
    $product = $_POST['product'];
    $total = $_POST['total'];

    $order->addorder($firstname, $lastname, $email, $address, $city, $username, $phone, $ordernotes, $product, $total);
    header("location:order.php");
}
    
?>