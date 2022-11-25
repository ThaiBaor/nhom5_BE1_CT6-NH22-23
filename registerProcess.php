<?php session_start();
require "config.php";
require "models/db.php";
require "models/account.php";
$account= new Account();
if (isset($_POST['username'])){
    $checkUsername = $account->checkUsername($_POST['username']);
    if ($checkUsername==1){
        setcookie("errorUser", "Đăng ki không thành công!", time()+1, "/","", 0);
        header("location:register.php"); 
    }
    else{
        if ($_POST['password']!=$_POST['checkpassword']){
            setcookie("errorPas", "Đăng ki không thành công!", time()+1, "/","", 0);
            header("location:register.php");
        }
        else
        {
            setcookie("successReg", "Đăng ki thành công!", time()+1, "/","", 0);
            $account->createAccount($_POST['username'],$_POST['password']);
            header("location:login.php");
        }
    }
}