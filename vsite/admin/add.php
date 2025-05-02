<?php 
include "config.php";
include "models/db.php";
include "models/category.php";
include "models/thanhvien.php";
$category = new Category;
$thanhvien = new Thanhvien;

if(isset($_POST['category'])){
$category->add($_POST['category']);
header("location:categories.php");
}