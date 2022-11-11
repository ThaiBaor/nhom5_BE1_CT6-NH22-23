<?php
class Products extends Db{
    public function getAllProducts(){
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get3Products(){
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 0,3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get4Products(){
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 4,4");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByProtype($type_id){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql ->bind_param("i",$type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword){
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `description` LIKE?");
        $keyword="%$keyword%";
        $sql ->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}