<?php
session_start();
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
$getAllCate = $category->getAllCate();
$getAllProducts = $product->getAllProducts();
$getUser = $thanhvien->getUser();

if(!isset($_SESSION['user'])){
header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Organicfood Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800'
        rel='stylesheet' type='text/css'>
    <style type="text/css">
        ul.pagination {
            list-style: none;
            float: right;
        }

        ul.pagination li.active {
            font-weight: bold
        }

        ul.pagination li {
            display: flex;
            padding: 10px
        }
    </style>
</head>

<body>
    <!--Header-part-->
    <div id="header">
        <h1><a href=""><img src="logo.png" alt=""></a></h1>
    </div>
    <!--close-Header-part-->
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#"
                    data-toggle="dropdown"
                    data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i> <span
                        class="text">Welcome Super Admin</span><b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php"><i class="icon-key"></i> Log
                            Out</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--start-top-serch-->
    <div id="search">
        <form action="result.php" method="get">
            <input name="keyword" type="text" placeholder="Search here..." />
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </form>
    </div>
    <!--close-top-serch-->