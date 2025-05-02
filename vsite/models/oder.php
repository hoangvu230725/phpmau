<?php
class Order extends Db
{
    public function getAll($page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT
    `orderdetails`.`id`,`product`, `quantity`,`orders`.`fullname`, `email`, `phone`, `address`, `total`, `note`
FROM
    `orderdetails`,`orders`
WHERE
    `orderdetails`.`orders`=`orders`.`id`
    ORDER BY `orderdetails`.`id` DESC
    LIMIT ?,?
    ");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllOrder(){
        $sql = self::$connection->prepare("SELECT * FROM `orders`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getOder($fullName,  $email, $phone, $address, $total, $note)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`fullname`, `email`, `phone`, `address`,`total`,`note`) 
        VALUES (?,?,?,?,?,?)");
        $sql->bind_param("ssssis",  $fullName, $email, $phone, $address, $total, $note);
        $sql->execute();
    }
    public function getOderID()
    {
        $sql = self::$connection->prepare("SELECT MAX(`id`) as `id` FROM orders");
        $sql->execute();
        $items = $sql->get_result()->fetch_assoc();
        return $items;
    }
    public function getOderDetail($product, $oders, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO `orderdetails`( `product`, `orders`, `quantity`) VALUES (?,?,?)");
        $sql->bind_param("iii", $product, $oders, $quantity);
        $sql->execute();
    }
}
