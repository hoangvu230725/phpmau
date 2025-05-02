<?php
class Thanhvien extends Db
{
    public function getUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM thanhvien");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getUserById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM thanhvien WHERE `id` =?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getUser2($page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM thanhvien LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `thanhvien` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    function add($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `thanhvien`(`name`) 
        VALUES(?)");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }
    function update($id,$pass)
    {
        $sql = self::$connection->prepare("UPDATE `thanhvien` SET `password`=? WHERE `id`=?");
        $sql->bind_param("si", $pass,$id);
        return $sql->execute();
    }
}
