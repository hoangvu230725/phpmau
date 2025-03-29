<?php
// Kết nối cơ sở dữ liệu và class CRUD
require_once "crud_database.php";
$crud = new crud_database();

// Kiểm tra nếu ID sản phẩm được truyền qua URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Lấy thông tin sản phẩm dựa vào ID
    $product = $crud->layDSSanPhamId($productId);
} else {
    // Chuyển hướng nếu không có ID sản phẩm
    header("Location: crud.php"); 
    exit;
}

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $madanhmuc = $_POST['madanhmuc'];

    // Gọi hàm để cập nhật sản phẩm
    $crud->updateProduct($id, $name, $price, $description, $image, $madanhmuc);

    // Chuyển hướng sau khi cập nhật thành công
    header("Location: crud.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Chỉnh sửa sản phẩm</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Form chỉnh sửa sản phẩm -->
    <div class="container">
        <h2>Chỉnh sửa sản phẩm</h2>
        <form method="POST" action="sua_product.php?id=<?php echo $productId; ?>">
            <div class="mb-3">
                <label for="id" class="form-label">Mã sản phẩm:</label>
                <input type="number" class="form-control" id="id" name="id" value="<?php echo $product['id']; ?>" required readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Đường dẫn hình ảnh:</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo $product['image']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="madanhmuc" class="form-label">Danh mục:</label>
                <select class="form-control" id="madanhmuc" name="madanhmuc" required>
                    <?php
                    // Lấy danh sách danh mục
                    $categories = $crud->layDSDanhMuc();
                    foreach ($categories as $category) {  
                    ?>
                        <option value="<?php echo $category['madanhmuc']; ?>" <?php echo ($product['madanhmuc'] == $category['madanhmuc']) ? 'selected' : ''; ?>>
                            <?php echo $category['madanhmuc']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </form>
    </div>

    <!-- Bao gồm Bootstrap JS và các thư viện cần thiết -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
