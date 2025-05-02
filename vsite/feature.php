                <!--Features product area-->
                <div class="features_product home_3 pt-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title text-center">
                                    <h3> Sản phẩm nổi bật </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="features_product_four_active owl-carousel owl-loaded owl-drag">
                                <?php
                                $getAllProductsFeature = $product->getAllProductsFeature(1, 4);
                                foreach ($getAllProductsFeature as $value):
                                ?>
                                    <div class="col-lg-2">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">hot</span>
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

                                                            </li>
                                                            <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                            <li><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><i class="ion-clipboard"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Features product end-->









                <!--organicfood wrapper start-->
                <div class="organic_food_wrapper home3">
                    <!--Shipping area start-->
                    <div class="shipping_area shipping_three ">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shipping_list d-flex justify-content-between">
                                        <div class="single_shipping_box d-flex">
                                            <div class="shipping_icon">
                                                <img src="assets/img/ship/1.png" alt="shipping icon">
                                            </div>
                                            <div class="shipping_content">
                                                <h6>Free Shipping On Order Over $120</h6>
                                                <p>Free shipping on all order</p>
                                            </div>
                                        </div>
                                        <div class="single_shipping_box one d-flex">
                                            <div class="shipping_icon">
                                                <img src="assets/img/ship/2.png" alt="shipping icon">
                                            </div>
                                            <div class="shipping_content">
                                                <h6>Money Return</h6>
                                                <p>Back guarantee under 7 days</p>
                                            </div>
                                        </div>
                                        <div class="single_shipping_box d-flex">
                                            <div class="shipping_icon">
                                                <img src="assets/img/ship/4.png" alt="shipping icon">
                                            </div>
                                            <div class="shipping_content">
                                                <h6>Online Support 24/7</h6>
                                                <p>Free shipping on all order</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Shipping area end-->

                    <!-- static home 3 area start -->
                    <div class="static_home3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="static_inner" style="background-image:url(assets/img/banner/bg_static2.png)">
                                        <div class="static_content">
                                            <p>Today Offer:<span> 70% Off </span>all organic for the next 02 hours only. Use coupon code <span>"ORGANICFOOD" </span>at checkout.<span> Learn more..</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- static home 3 area end -->