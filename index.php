<?php 
    session_start();
    require_once "crud_database.php";
    // Gọi hàm
    $crud = new crud_database();
    $danhmuc = $crud->layDSDanhMuc();

    // Kiểm tra có null hay không ?
    $categoryId = isset($_GET['id']) ? (int)$_GET['id'] : null;
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

    $limit = 4; // Số sản phẩm trên mỗi trang
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Lấy danh sách sản phẩm với phân trang và tìm kiếm
    if ($keyword) {
        $sanpham = $crud->searchProducts($keyword, $categoryId, $limit, $offset);
    } else {
        $sanpham = $crud->layDSSanPham($categoryId, $limit, $offset);
    }

    // Lấy tổng số sản phẩm để tính số trang
    $totalProducts = $keyword ? count($sanpham) : $crud->getTotalProducts($categoryId); 
    $totalPages = ceil($totalProducts / $limit);

    // Tính tổng số lượng sản phẩm trong giỏ hàng
    $totalItems = 0;
    if (isset($_SESSION['cart'])) {
        $totalItems = array_sum($_SESSION['cart']);
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <?php   foreach ($danhmuc as $values) { ?>
                                <li><a class="dropdown-item" href="index.php?id=<?php echo $values['madanhmuc'] ?>"><?php echo $values['tendanhmuc'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="me-3" method="GET" action="">
                        <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="<?php echo htmlspecialchars($keyword); ?>" >
                        <button type="submit">Tìm kiếm</button>
                    </form>
                    <form action="cart.php" class="d-flex me-3">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $totalItems; ?></span>
                        </button>
                    </form>
                    <form action="login.php" class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
                </div>
            </div>
        </header>
        <!-- Product Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 justify-content-center">
                    <?php foreach($sanpham as $values) { ?>
                    <div class="col mb-5"> 
                        <div class="card h-100"  >
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="image/<?php echo $values['image'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="item.php?id=<?php echo $values['id']; ?>">
                                        <h5 class="fw-bolder"><?php echo $values['name']; ?></h5>
                                    </a>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    <?php echo $values['price'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="xuli_cart.php?id=<?php echo $values['id']; ?>&quantity=1">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
                    <!--  Nút chuyển trang -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1){ ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page - 1; ?>&id=<?php echo $categoryId; ?>">Previous</a></li>
                <?php } ?>
                <?php for ($i = 1; $i <= $totalPages; $i++){ ?>
                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                    <a class="page-link" href="index.php?page=<?php echo $i; ?>&id=<?php echo $categoryId; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <?php if ($page < $totalPages){ ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page + 1; ?>&id=<?php echo $categoryId; ?>">Next</a></li>
                <?php } ?>
            </ul>
        </nav>

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
