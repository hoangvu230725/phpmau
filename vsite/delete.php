<?php 
session_start();
$id = $_GET['id'];
if($id=="all"){
    unset($_SESSION['cart']);
}
elseif(isset($_SESSION['cart'][$id])){
    unset($_SESSION['cart'][$id]);
}
header("location:cart.php");