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

    public function getMaunufacturesById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function countAllManufacture()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM manufactures");
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
    // Hàm thêm manufacture 
    public function addManufacture($manuName)
    {
        $sql = self::$connection->prepare("INSERT INTO manufactures(`manu_name`) VALUES (?) ");
        $sql->bind_param("s", $manuName);
        return $sql->execute();
    }
    public function editManufacture($manuId, $manuName)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`= ? WHERE `manu_id` = ?");
        $sql->bind_param("si", $manuName,$manuId);
        return $sql->execute();
    }
    // Hàm xóa manufacture 
    public function deleteManufacture($manuId)
    {
        $sql = self::$connection->prepare("DELETE FROM manufactures WHERE `manu_id`=?");
        $sql->bind_param("i", $manuId);
        $sql->execute();
    }
    public function countConflictProduct($manuId)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty' FROM manufactures,products WHERE manufactures.manu_id=products.manu_id AND manufactures.manu_id=?");
        $sql->bind_param("i", $manuId);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
}
