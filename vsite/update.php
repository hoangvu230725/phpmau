<?php 
session_start();
if (isset($_POST['update'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $value) {
            if ($_POST['so_luong' . $value['id']] <= 0) {
                unset($_SESSION['cart'][$value['id']]);
            } else {
                $_SESSION['cart'][$value['id']]['quantity'] = $_POST['so_luong' . $value['id']];
            }
        }
    }
}
header("location:cart.php");
?>