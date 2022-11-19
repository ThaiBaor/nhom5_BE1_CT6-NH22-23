<?php
class Products extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get3Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get4Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 4,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getProductByProtype($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByManu($manu)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function search($keyword,$protype){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE? AND `type_id`=?");
        $keyword="%$keyword%";
        $sql ->bind_param("si",$keyword,$protype);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function countByProtype($protype)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM products WHERE `type_id` =?");
        $sql->bind_param("i", $protype);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }

    public function countByManu($manu)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM products WHERE `manu_id` =?");
        $sql->bind_param("i", $manu);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }

    public function getHotDeals()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE sold>20 LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // lấy 3 sản phẩm hotdeal đầu danh sách
    public function getHotDealsByTypeId($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = $type_id AND sold>20 LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // lấy 3 sản phẩm hotdeal tiếp theo
    public function getHotDealsByTypeIdNext($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = $type_id AND sold>20 LIMIT 3,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Lấy sản phẩm liên quan theo loại
    public function getRelatedProducts($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = $type_id  LIMIT 0,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getFirst6Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 0,6");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function countSearchProducts($keyword, $protype){
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty' FROM products WHERE `name` LIKE? AND `type_id`=?");
        $keyword="%$keyword%";
        $sql ->bind_param("si",$keyword,$protype);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
    public function searchAll($keyword){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE?");
        $keyword="%$keyword%";
        $sql ->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
