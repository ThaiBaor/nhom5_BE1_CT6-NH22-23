<?php
require "config.php";
require "models/db.php";
require "models/account.php";
$user = new Account();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $user->editUser($id,$userName,$password);
    header("location:user.php");
}
