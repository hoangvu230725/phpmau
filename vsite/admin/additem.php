<?php
var_dump($_FILES);
include "config.php";
include "models/db.php";
include "models/product.php";
$products = new Product;
//xu ly them
$name = $_POST['name'];
$price = $_POST['price'];
$content = $_POST['content'];
$image = $_FILES["fileUpload"]["name"];
$category = $_POST['cate'];
$featured = $_POST['featured'];
$products->addItem($name,$price,$content,$image,$category,$featured);
//xu ly upload file
$target_dir = "../assets/img/image/";
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
//chuyen huong trang sau khi them thanh cong
header('location:items.php');