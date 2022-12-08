<?php
require "config.php";
require "models/db.php";
require "models/manufactures.php";
$manufacture = new Manufactures();
$id = $_GET['id'];
$manufacture->deleteManufacture($id);
header("location:manufacture.php");