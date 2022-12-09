<?php
require "config.php";
require "models/db.php";
require "models/manufactures.php";
$manufacture = new Manufactures();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $manufacture->deleteManufacture($id);
    header("location:manufacture.php");
}
