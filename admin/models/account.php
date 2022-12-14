<?php
class Account extends Db
{

    public function getAllAccount()
    {
        $sql = self::$connection->prepare("SELECT * FROM account ");
        $sql->execute(); //return an object
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getAccountById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM account WHERE `id`=?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function countAllUser()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty'FROM account");
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']-1; //return an array
    }

    public function deleteAccount($id)
    {
        $sql = self::$connection->prepare("DELETE FROM account WHERE `id`=?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }

    public function editUser($id,$username,$password)
    {
        $sql = self::$connection->prepare("UPDATE `account` 
        SET `username`=?,`password`= ? WHERE `id` = ?");
        $password = MD5($password);
        $sql->bind_param("ssi",$username,$password,$id);
        return $sql->execute();
    }

    public function getAccount($username, $password)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty' FROM account WHERE `username`=? AND `password`=?");
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $result = $sql->get_result()->fetch_assoc();
        return $result['qty']; //return an array
    }
    public function checkUsername($username)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty' FROM account WHERE `username`=?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $result = $sql->get_result()->fetch_assoc();
        return $result['qty']; //return an array
    }
    public function createAccount($username, $password)
    {
        $sql = self::$connection->prepare("INSERT INTO account (username,password) VALUES (?,?)");
        $password = MD5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
    }
    public function countConflictProduct($username)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) AS 'qty' FROM oder,account WHERE oder.username=account.username AND account.username=?");
        $sql->bind_param("i", $username);
        $sql->execute(); //return an object
        $qty = $sql->get_result()->fetch_assoc();
        return $qty['qty']; //return an array
    }
}
