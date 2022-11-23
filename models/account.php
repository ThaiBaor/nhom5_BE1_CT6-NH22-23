<?php
class Account extends Db{
public function getAccount($username,$password){
    $sql = self::$connection->prepare("SELECT COUNT(*) as 'qty' FROM account WHERE `username`=? AND `password`=?");
    $sql->bind_param("ss",$username,$password);
    $sql->execute(); //return an object
    $result = $sql->get_result()->fetch_assoc();
    return $result['qty']; //return an array
}
}