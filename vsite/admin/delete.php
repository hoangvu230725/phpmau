<?php
//xu ly xoa 3 bang
//neu  get id -> xoa items
//neu get cate_id -> xoa categories
//neu author_id -> xoa authors
include "config.php";
include "models/db.php";
include "models/product.php";
include "models/thanhvien.php";
include "models/category.php";
include "models/oder.php";

$order = new Order;
$thanhvien = new Thanhvien;
$product = new Product;
$category = new Category;
$getAllCates = $category->getAllCate();
$getAllProducts = $product->getAllProducts();

if (isset($_GET['id'])) {
    //xu ly xoa id trong bang items
    $id = $_GET['id'];
    $product->delete($id);
    header('location:items.php');
} elseif (isset($_GET['cate-id'])) {
    $id = $_GET['cate-id'];
    $category->delete($id);
    header('location:categories.php');
    //xu ly xoa id trong bang catagories
} elseif (isset($_POST['user-id'])) {
    if ($_POST['level'] == 2) {
        $id = $_POST['user-id'];
        $thanhvien->delete($id);
        header('location:users.php');
    }
    else{
        header('location:users.php');
    }

    //xu ly xoa id trong bang author
}
