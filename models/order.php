<?php
class Order extends Db
{
    public function addorder($firstname, $lastname, $email, $address, $city, $username, $phone, $ordernote, $product, $total)
    {
        $sql = self::$connection->prepare("INSERT INTO oder(`firstname`, `lastname`, `email`, `address`, `city`, `username`, `phone`, `ordernote`, `product`, `total`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssssi",$firstname, $lastname, $email, $address, $city, $username, $phone, $ordernote, $product, $total);
        return $sql->execute(); //return an object       
    }
    public function getAllOrderByUsername($username)
    {
        $sql = self::$connection->prepare("SELECT * FROM oder WHERE oder.username=?");
        $sql->bind_param("i", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}