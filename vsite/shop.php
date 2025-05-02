<?php
include "header.php";
?>
<!--organicfood wrapper start-->
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php">Home ></a>
                        </li>
                        <li>shop</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="organic_food_wrapper">
    <!--- shop_wrapper area  -->
    <div class="shop_wrapper ptb-90">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-12">
                    <div class="shop_sidebar">
                        <div class="block_categories">
                            <div class="category_top_menu widget">
                                <div class="widget_title">
                                    <h3>categories</h3>
                                </div>

                                <ul class="shop_toggle">
                                    <?php
                                    foreach ($getAllCates as $value):
                                    ?>

                                        <li class="categorie_sub"><a href="achive.php?cate_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a> </li>
                                    <?php endforeach ?>
                                </ul>

                            </div>
                        </div>
                        <div class="search_filters_wrapper">
                            <div class="price_filter widget">
                                <div class="widget_title">
                                    <h3>filter By price</h3>
                                </div>
                                <div class="search_filters widget">
                                    <div id="slider-range"></div>
                                    <input type="text" name="text" id="amount" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="categories_banner">
                        <div class="categories_banner_inner">
                            <img src="assets/img/banner/shop.jpg" alt="">
                        </div>
                        <h3>SHOP</h3>
                    </div>
                    <?php

                    // hiển thị 5 sản phẩm trên 1 trang
                    $count = 8;
                    // Lấy số trang trên thanh địa chỉ
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    // Tính tổng số dòng, ví dụ kết quả là 18
                    $total = count($getAllProducts);
                    // lấy đường dẫn đến file hiện hành
                    $url = $_SERVER['PHP_SELF'] . "?all";
                    $getAllProducts2 = $product->getAllProducts2($page, $count);
                    ?>
                    <div class="tav_menu_wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-7 col-sm-6">
                                <div class="tab_menu shop_menu">
                                    <div class="tab_menu_inner">
                                        <ul class="nav" role="tablist">
                                            <li><a class="active" data-toggle="tab" href="#shop_active" role="tab" aria-controls="shop_active" aria-selected="true"><i class="fa fa-th" aria-hidden="true"></i></a></li>

                                            <li><a data-toggle="tab" href="#featured_active" role="tab" aria-controls="featured_active" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tab_menu_right">
                                        <p>There are <?php echo $total ?> products.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_product_wrapper">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="shop_active">
                                <div class="row">
                                    <?php

                                    foreach ($getAllProducts2 as $value):
                                        $cateName = $category->getNameById($value['category']);

                                    ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="single__product">
                                                <div class="single_product__inner">
                                                    <span class="new_badge"><?php echo $cateName[0]['name'] ?></span>
                                                    <span class="discount_price">-5%</span>
                                                    <div class="product_img">
                                                        <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                                            <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product__content text-center">
                                                        <div class="produc_desc_info">
                                                            <div class="product_title">
                                                                <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                                            </div>
                                                            <div class="product_price">
                                                                <p><?php echo $value['price'] ?>,000₫</p>
                                                            </div>
                                                        </div>
                                                        <div class="product__hover">
                                                            <ul>
                                                                <li>
                                                                    <form action="add-to-cart.php?id=<?php echo $value['id'] ?>" method="post">
                                                                        <button type="submit" name="add-to-cart"><i class="ion-android-cart"></i></button>
                                                                    </form>
                                                                <li><a class="cart-fore" href="#" data-toggle="modal" data-target="<?php echo $value['id'] ?>" title="Quick View"><i class="ion-android-open"></i></a></li>

                                                                <li><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><i class="ion-clipboard"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="featured_active" role="tabpanel">
                                <?php
                                $getAllProducts2_1 = $product->getAllProducts2($page, $count);
                                foreach ($getAllProducts2_1 as $value):

                                ?>
                                    <div class="tab_product_bottom_wrapper">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-5 col-sm-5">
                                                <div class="single_product__inner inner_shop">
                                                    <span class="new_badge"><?php echo $cateName['0']['name'] ?></span>
                                                    <span class="discount_price">-5%</span>
                                                    <div class="product_img">
                                                        <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                                            <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7">
                                                <div class="product__content text-left">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title title_shop">
                                                            <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                                        </div>
                                                        <div class="product_price price_shop">
                                                            <p><?php echo $value['price'] ?>,000₫</p>

                                                        </div>
                                                        <div class="product_content_shop">
                                                            <p><?php echo $value['content'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover hover_shop">
                                                        <div class="product_addto_cart">
                                                            <form action="add-to-cart.php?id=<?php echo $value['id'] ?>" method="post">
                                                                <button type="submit" name="add-to-cart"><i class="ion-android-cart"></i></button>
                                                            </form>
                                                        </div>
                                                        <div class="product_cart_icone">
                                                            <ul>
                                                                
                                                                <li><a class="cart-fore" href="#" data-toggle="modal" data-target="<?php echo $value['id'] ?>" title="Quick View"><i class="ion-android-open"></i></a></li>

                                                                <li><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><i class="ion-clipboard"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
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
        </div>
    </div>
    <!--- shop_wrapper area end  -->

    <!--Brand logo start-->
    <div class="brand_logo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="brand_list_carousel owl-carousel shop_page">
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/1.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/2.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/3.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/4.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/5.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/1.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/2.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/3.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/4.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single_brand_logo">
                            <a href="#">
                                <img src="assets/img/brand/5.png" alt="brand logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Brand logo end-->


</div>


<!--organicfood wrapper end-->
<?php
include "footer.php";
?>
1