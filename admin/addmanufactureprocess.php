<?php
require "config.php";
require "models/db.php";
require "models/manufactures.php";
$manufacture = new Manufactures();
if (isset($_POST['name'])){
    $name = $_POST['name'];   
    $newManufacture = $manufacture->addManufacture($name);
    header("location:manufacture.php");
}