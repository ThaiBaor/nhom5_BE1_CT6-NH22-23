<?php
require "config.php";
require "models/db.php";
require "models/manufactures.php";
$manufacture = new Manufactures();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $manuName = $_POST['name'];
    $manufacture->editManufacture($id, $manuName);
    //header("location:manufacture.php");
}
