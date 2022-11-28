<?php
session_start();
require "config.php";
require "models/db.php";
require "models/account.php";
$account= new Account();
if (isset($_POST['username'])){
    $username=$_POST['username'];
    $password=MD5($_POST['password']);
    $check=$account->getAccount($username,$password);
    if ($check==1){
        $_SESSION['account']=true;
        if ($username =='Admin'){
            header("location:admin/admin.php"); 
        }
        else{
            header("location:index.php");   
        }
        }
    else{
        setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
        header("location:login.php");  
    }
}
