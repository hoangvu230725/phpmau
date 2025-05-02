<?php
class Order extends Db
{
    public function getOder($fullName,  $email, $phone, $address, $total, $note)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`fullName`, `email`, `phone`, `address`,`total`,`note`) 
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
    public function getOderDetail($product,$oders,$quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO `orderdetails`( `product`, `orders`, `quantity`) VALUES (?,?,?)") ;
        $sql->bind_param("iii", $product,$oders,$quantity );
        $sql->execute();
    }
}
