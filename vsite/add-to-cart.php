<?php 
session_start();
require_once "models/db.php";
$id = $_GET['id'];

$sql = "SELECT * FROM `products` WHERE `id` = $id";
$result = mysqli_query($conn,$sql);


$product_cart = array();
foreach($result as $value){
    $product_cart[$value['id']] = $value; 
}
$det = $product_cart[$id];
echo "<pre>";
print_r($det);

if(isset($_POST["add-to-cart"])){
    if (!isset($_SESSION["cart"])||$_SESSION["cart"]==null) {
        $product_cart[$id]['quantity'] = 1;
        $_SESSION["cart"][$id] = $product_cart[$id];
    }
    else {
        if(array_key_exists($id,$_SESSION["cart"])){
            $_SESSION["cart"][$id]['quantity']+=1;
        }
        else{
            $product_cart[$id]['quantity'] = 1;
            $_SESSION["cart"][$id] = $product_cart[$id];
        }
    }
    
    header("location:cart.php");

}