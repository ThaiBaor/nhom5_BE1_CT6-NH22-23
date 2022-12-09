<?php
require "config.php";
require "models/db.php";
require "models/account.php";
$user = new Account();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user->deleteAccount($id);
    header("location:user.php");
}
