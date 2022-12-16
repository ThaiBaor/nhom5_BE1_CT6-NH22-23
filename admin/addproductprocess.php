<?php
require "config.php";
require "models/db.php";
require "models/products.php";
$products = new Products;
$errorPicture ="";
if (isset($_POST['name'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $desc = $_POST['description'];
    $sold= $_POST['sold'];
    $instock = $_POST['instock'];
    $feature= isset($_POST['feature'])?1:0;
    $onsale= isset($_POST['onsale'])?1:0;
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $newProduct = $products->addProduct($name, $type_id, $manu_id, $image, $price, $desc, $sold ,$instock, $feature, $onsale);

    $target_dir1 = "./img/";
    $target_file1 = $target_dir1.basename($_FILES["image"]["name"]);   
    $target_dir2 = "../img/";
    $target_file2 = $target_dir2.basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
        } else {
                $errorPicture="File is not an image.";
                $uploadOk = 0;
            }
    }
    // Check if file already exists
    if (file_exists($target_file1)) {
        $errorPicture="Sorry, file already exists.";
    $uploadOk = 0;
    }
  
  // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $errorPicture="Sorry, your file is too large.";
       $uploadOk = 0;
    }
  
     // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            $errorPicture="Sorry, only JPG, JPEG & PNG  files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        setcookie("error", $errorPicture, time()+1, "/","", 0);
        header("location:addproduct.php");
      // if everything is ok, try to upload file
      } else{
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file2);
        
      }
      header("location:product.php");
}
?>
