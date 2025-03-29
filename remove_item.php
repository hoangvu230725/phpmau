<?php
session_start();

// Lấy ID sản phẩm từ URL
$productId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($productId && isset($_SESSION['cart'][$productId])) {
    // Xóa sản phẩm khỏi session
    unset($_SESSION['cart'][$productId]);
}

// Chuyển hướng về trang giỏ hàng
header('Location: cart.php');
exit();
