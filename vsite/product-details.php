<?php include "header.php"; ?>
<!--breadcrumb area start-->
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php">Home ></a>
                        </li>
                        <li>Product details </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->


<!-- primary block area -->
<div class="table_primary_block pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <?php
                $product_id = $_GET['product_id'];
                $getProduct = $product->getProduct($product_id);
                ?>
                <div class="product-flags">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabone" role="tabpanel">
                            <div class="product_tab_img">
                                <a href="#"><img src="<?php echo $getProduct['image'] ?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="product__details_content">
                    <div class="demo_product">
                        <h2><?php echo $getProduct['name'] ?></h2>
                    </div>
                    <div class="product_comments_block">
                        <div class="comments_note clearfix">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="comments_advices">
                            <ul>
                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>
                                        Read reviews (<span>1</span>)</a></li>
                                <li><a href="#"><i class="fa fa-pencil"></i>Read reviews </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="current_price">
                        <span><?php echo $getProduct['price'] ?>,000₫</span>
                    </div>
                    <div class="product_information">
                        <div id="product_description_short">
                            <p><?php echo $getProduct['content'] ?></p>
                        </div>
                        <div class="product_variants">
                        <form action="add-to-cart.php?id=<?php echo $getProduct['id'] ?>" method="post">
                            <div class="quickview_plus_minus">
                                <span class="control_label">Quantity</span>
                                <div class="quickview_plus_minus_inner">
                                    
                                        <div class="cart-plus-minus">
                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                        </div>
                                        <div class="add_button">
                                            <button type="submit" name="add-to-cart">ADD TO CART</button>
                                        </div>
                                    

                                </div>
                            </div>
                            </form>
                            <div class="product-availability">
                                <span id="availability">
                                    <i class="zmdi zmdi-check"></i>
                                    In stock
                                </span>
                            </div>
                            <div class="social-sharing">
                                <span>Share</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <img src="assets/img/cart/cart1.png" alt="">
                                        <span>Security policy (edit with Customer reassurance module)</span>
                                    </li>
                                    <li>
                                        <img src="assets/img/cart/cart2.png" alt="">
                                        <span>Delivery policy (edit with Customer reassurance module)</span>
                                    </li>
                                    <li>
                                        <img src="assets/img/cart/cart3.png" alt="">
                                        <span>Return policy (edit with Customer reassurance module)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- primary block end -->

<!-- product page tab -->

<div class="product_page_tab ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_button">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li>
                            <a class=" tav_past active" id="contact-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="true">Reviews</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active" id="Reviews" role="tabpanel">
                        <div class="product_comments_block_tab">
                            <div class="comment_clearfix">
                                <div class="comment_author">
                                    <span>Grade </span>
                                    <div class="star_content clearfix">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="comment_author_infos">
                                    <strong>posthemes </strong>
                                    <br>
                                    <em>05/08/2018</em>
                                </div>
                                <div class="comment_details">
                                    <h4>Demo</h4>
                                    <p>themes</p>
                                </div>
                                <div class="review">
                                    <p><a href="#">Write your review !</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product page tab end -->

<!--Features product area-->
<?php include "feature.php" ?>
<!--Features product end-->

<?php include "footer.php"; ?>