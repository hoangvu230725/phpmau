<?php
session_start(); // Bắt đầu session
session_unset(); // Xóa tất cả các biến session
session_destroy(); // Hủy session hiện tại
header("Location: cart.php"); // Chuyển hướng người dùng đến trang khác (tùy ý)
exit(); // Ngăn mã tiếp tục chạy
?>
