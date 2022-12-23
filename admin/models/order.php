<?php
class Order extends Db
{
    public function addorder($firstname, $lastname, $email, $address, $city, $country, $phone, $ordernote, $product, $total)
    {
        $sql = self::$connection->prepare("INSERT INTO oder(`firstname`, `lastname`, `email`, `address`, `city`, `country`, `phone`, `ordernote`, `product`, `total`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssssi",$firstname, $lastname, $email, $address, $city, $country, $phone, $ordernote, $product, $total);
        return $sql->execute(); //return an object       
    }
    
    public function getAllOrder()
    {
        $sql = self::$connection->prepare("SELECT * FROM `oder` ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getOrderById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM oder WHERE `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function deleteOrder($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `oder` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute(); //return an object       
    }
    public function editOrder($id,$firstname, $lastname, $email, $address, $city, $country, $phone, $ordernote, $product, $total)
    {
        $sql = self::$connection->prepare("UPDATE `oder` SET `firstname`=?,`lastname`=?,`email`=?,`address`=?,`city`=?,`country`=?,`phone`=?,`ordernote`=?,`product`=?,`total`=? WHERE `id` = ?");
        $sql->bind_param("sssssssssii",$firstname, $lastname, $email, $address, $city, $country, $phone, $ordernote, $product, $total,$id);
        return $sql->execute(); //return an object       
    }

    public function countAllOrder()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM oder");
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
}