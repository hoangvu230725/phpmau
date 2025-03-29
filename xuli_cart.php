<?php
session_start();

// Kiểm tra xem ID sản phẩm có được gửi không
if (isset($_GET['id'])) {
    $productId = (int)$_GET['id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    // Nếu chưa có giỏ hàng, khởi tạo giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }

    // Chuyển hướng trở lại trang trước
    header("Location: index.php");
    exit;
} else {
    echo "Không tìm thấy sản phẩm!";
}
?>
