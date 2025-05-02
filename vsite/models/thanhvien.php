<?php
class Thanhvien extends Db
{
    public function getThanhVien($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM thanhvien WHERE `username` = ? and `password`=?");
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $items = $sql->get_result()->fetch_assoc();
        return $items;
    }
    public function getUser($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM thanhvien WHERE `id` = ? ");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getCheck($username)
    {
        // Kiểm tra xem username đã tồn tại chưa
        $sql = self::$connection->prepare("SELECT * FROM thanhvien WHERE `username` = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getSignUp($username, $password, $fullName, $company, $email, $phone, $address)
    {
        $sql = self::$connection->prepare("INSERT INTO `thanhvien`(`username`, `password`, `fullName`, `company`, `email`, `phone`, `address`,`level`) 
        VALUES (?,?,?,?,?,?,?,2)");
        $sql->bind_param("sssssss", $username, $password, $fullName, $company, $email, $phone, $address);
        $sql->execute();
    }

    public function getUpdate($id, $fullName, $company, $email, $phone, $address)
    {
        $sql = self::$connection->prepare("UPDATE `thanhvien` SET `fullName`=?,`company`=?,`email`=?,`phone`=?,`address`=? WHERE `id` = ?");
        $sql->bind_param("sssssi", $fullName, $company, $email, $phone, $address,$id);
        $sql->execute();
    }
}
