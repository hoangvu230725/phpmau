<?php
include "config.php";
include "models/db.php";
include "models/category.php";
include "models/thanhvien.php";
$category = new Category;
$thanhvien = new Thanhvien;

if (isset($_POST['cate-id'])) {
    $id = $_POST['cate-id'];
    $name = $_POST['name'];
    $category->update($id, $name);
    header("location:categories.php");
} elseif (isset($_POST['user-id'])) {
    $id = $_POST['user-id'];
    $pass = $_POST['password'];
    $thanhvien->update($id,$pass);
    header("location:users.php");
}
