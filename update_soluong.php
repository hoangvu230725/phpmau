<?php
session_start();

// Kiểm tra thông tin từ POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    if ($productId && $quantity > 0) {
        // Cập nhật số lượng trong session
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }
}

// Chuyển hướng trở lại trang giỏ hàng
header('Location: cart.php');
exit();
