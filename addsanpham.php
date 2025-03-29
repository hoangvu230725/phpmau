<?php 
    require_once "crud_database.php";
    $crud = new crud_database();
    $danhmuc = $crud -> layDSDanhMuc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="add_xuli.php" method="POST" enctype="multipart/form-data">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br><br>

        <label for="TenSanPham">Product Name:</label><br>
        <input type="text" id="TenSanPham" name="TenSanPham" required><br><br>

        <label for="Gia">Price:</label><br>
        <input type="number" id="Gia" name="Gia" step="0.01" required><br><br>

        <label for="MoTa">Description:</label><br>
        <textarea id="MoTa" name="MoTa"></textarea><br><br>

        <label for="Hinh">Image URL:</label><br>
        <input type="text" id="Hinh" name="Hinh"><br><br>

        <label for="MaDanhMuc">Category:</label><br>
        <select id="MaDanhMuc" name="MaDanhMuc">
            <!-- Options should be populated dynamically from the DanhMuc table -->
             <?php foreach($danhmuc as $value){ ?>
            <option ><?php echo $value['madanhmuc'] ?></option>
            <?php } ?>
          
            <!-- Add more options based on your categories -->
        </select><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
