<?php
class Manufactures extends Db
{
    // Hàm lấy tất cả manufactures
    public function getAllMaunufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    // Hàm thêm manufacture 
    public function addManufacture($manuName)
    {
        $sql = self::$connection->prepare("INSERT INTO manufactures(`manu_name`) VALUES (?) ");
        $sql->bind_param("s", $manuName);
        $sql->execute();
    }
    // Hàm xóa manufacture 
    public function deleteManufacture($manuId)
    {
        $sql = self::$connection->prepare("DELETE FROM manufactures WHERE `manu_id`=?");
        $sql->bind_param("i", $manuId);
        $sql->execute();
    }
}
