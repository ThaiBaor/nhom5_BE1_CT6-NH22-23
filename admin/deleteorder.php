<?php
require "config.php";
require "models/db.php";
require "models/order.php";
$order = new Order;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $order->deleteOrder($id);
    header("location:order.php");
}
