<?php include "header.php"; ?>
<?php
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $searchCount = $product->searchCount($keyword);
    // hiển thị 5 sản phẩm trên 1 trang
    $count = 5;
    // Lấy số trang trên thanh địa chỉ
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // Tính tổng số dòng, ví dụ kết quả là 18
    $total = count($searchCount);
    // lấy đường dẫn đến file hiện hành
    $url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword;
}
?>
<div class="new_product new_product_three">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3>Kết quả: <?php echo count($searchCount) ?> sản phẩm</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active_four owl-carousel owl-loaded owl-drag">
                <?php
                $search = $product->search($keyword, $page, $count);
                foreach ($search as $value):
                ?>

                    <div class="col-lg-2">
                        <div class="single__product">
                            <div class="single_product__inner">
                                <div class="product_img">
                                    <a href="#">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product__content text-center">
                                    <div class="produc_desc_info">
                                        <div class="product_title">
                                            <h4><a href="product-details.html"><?php echo $value['name'] ?></a></h4>
                                        </div>
                                        <div class="product_price">
                                            <p><?php echo $value['price'] ?>,000₫</p>
                                        </div>
                                    </div>
                                    <div class="product__hover">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                            <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal" title="Quick View"><i class="ion-android-open"></i></a></li>
                                            <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="shop_pagination">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="total_item_shop">
                        Showing <?php echo $count . "-" . $total ?>item(s)
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                    <div class="page_list_clearfix  text-center">
                        <?php echo $product->paginate($url, $total, $page, $count, 1) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>