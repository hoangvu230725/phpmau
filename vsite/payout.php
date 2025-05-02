<?php
session_start();
include "config.php";
include "models/db.php";
include "models/oder.php";
$order = new Order;

if (isset($_POST['order'])) {
    if (empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address'])) {
        echo "Vui lòng điền đầy đủ thông tin.";
    } else {
        $cart = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $total = 0;
        foreach ($cart as $value) {
            $total += $value['price'] * $value['quantity'];
        }
        $getOder = $order->getOder($fullName, $email, $phone, $address, $total, $note);
        $getOderID = $order->getOderID();
        foreach ($cart as $value) {
            $getOderDetail = $order->getOderDetail($value['id'], $getOderID['id'], $value['quantity']);
        }
        unset($_SESSION['cart']);
        header('location: shop.php');
    }

}
