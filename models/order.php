<?php
class Order extends Db
{
    public function addorder($firstname, $lastname, $email, $address, $city, $country, $phone, $ordernote, $product, $total)
    {
        $sql = self::$connection->prepare("INSERT INTO oder(`firstname`, `lastname`, `email`, `address`, `city`, `country`, `phone`, `ordernote`, `product`, `total`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssssi",$firstname, $lastname, $email, $address, $city, $country, $phone, $ordernote, $product, $total);
        return $sql->execute(); //return an object       
    }
    
}