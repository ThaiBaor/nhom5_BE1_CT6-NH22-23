<?php
class Protype extends Db
{
    public function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getProtypeById($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id=?");
        $sql -> bind_param("i",$type_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function addProtype($typename){
        $sql = self::$connection->prepare("INSERT INTO protypes(`type_name`) VALUES (?) ");
        $sql->bind_param("s",$typename);
        $sql->execute();
    }
    public function deleteProtype($typeid){
        $sql = self::$connection->prepare("DELETE FROM protypes WHERE `type_id`=?");
        $sql->bind_param("i",$typeid);
        $sql->execute();
    }
    
}
