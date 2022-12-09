<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$protype = new Protype();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $typeName = $_POST['name'];
    $protype->editProtype($id, $typeName);
    header("location:protype.php");
}
