<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$protype = new Protype();
$id = $_GET['id'];
$protype->deleteProtype($id);
header("location:protype.php");