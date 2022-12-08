<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$protype = new Protype();
if (isset($_POST['name'])){
    $name = $_POST['name'];   
    $newProtype = $protype->addProtype($name);
    header("location:protype.php");
}