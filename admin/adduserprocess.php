<?php
require "config.php";
require "models/db.php";
require "models/account.php";
$user = new Account();
if (isset($_POST['username'])){
    $username = $_POST['username'];   
    $password = $_POST['password'];   
    $newUser = $user->createAccount($username,$password);
    header("location:user.php");
}