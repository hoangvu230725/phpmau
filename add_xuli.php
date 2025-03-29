<?php 
    require_once "crud_database.php";
    $crud = new crud_database();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $ten = $_POST['TenSanPham'];
        $gia = $_POST['Gia'];
        $mota = $_POST['MoTa'];
        $hinh = $_POST['Hinh'];
        $madanhmuc = $_POST['MaDanhMuc'];

        $addsanpham = $crud->addProduct($id,$ten,$gia,$mota,$hinh,$madanhmuc);
        header('Location: crud.php');
    }
?>
