<?php
session_start();
require_once "crud_database.php";

// Tạo đối tượng CRUD
$crud = new crud_database();

// Lấy danh sách sản phẩm trong giỏ hàng
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Lấy chi tiết sản phẩm từ database
$cartDetails = [];
foreach ($cart as $productId => $quantity) {
    $product = $crud->layDSSanPhamId($productId);
    if ($product) {
        $product['quantity'] = $quantity;
        $cartDetails[] = $product;
    }
}

// Tính tổng số lượng sản phẩm trong giỏ hàng
$totalItems = array_sum($cart);

// Tính tổng giá trị giỏ hàng
$grandTotal = 0;
foreach ($cartDetails as $item) {
    $grandTotal += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shopping Cart</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Shop Name</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $totalItems; ?></span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <h2>Shopping Cart</h2>
            <div class="text-end mb-3">
                <a class="btn btn-outline-dark" href="xoatatca.php">Remove All</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-end">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Total</th>
                        <th class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartDetails as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td class="text-end"><?php echo number_format($item['price'], 2); ?>$</td>
                        <td class="text-center"><?php echo $item['quantity']; ?></td>
                        <td class="text-end"><?php echo number_format($item['price'] * $item['quantity'], 2); ?>$</td>
                        <td class="text-center">
                            <a href="remove_item.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                        <td class="text-end"><strong><?php echo number_format($grandTotal, 2); ?>$</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
