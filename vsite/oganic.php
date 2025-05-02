<!--Best seller product -->
<div class="best_seller_product two best_seller_three">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-8">
                <?php
                $getAllProductsByCate = $product->getAllProductsByCate(1);
                $cateName = $category->getNameById(1);
                ?>
                <div class="section_title space_2 text-left">
                    <h3> <?php echo $cateName['0']['name']; ?> </h3>
                </div>
                <div class="best_selling_product_three owl-carousel">

                    <div class="best_selling_product">
                        <?php
                        $getProductsByCate = $product->getProductsByCate(1, 1, 3);
                        foreach ($getProductsByCate as $value):
                        ?>
                            <div class="single_small_product small_three">
                                <div class="product_thumb">
                                    <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price"><?php echo $value['price'] ?>,000₫</span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="best_selling_product">
                        <?php
                        $getProductsByCate = $product->getProductsByCate(1, 2, 3);
                        foreach ($getProductsByCate as $value):
                        ?>
                            <div class="single_small_product small_three">
                                <div class="product_thumb">
                                    <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price"><?php echo $value['price'] ?>,000₫</span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <?php
                $getAllProductsByCate = $product->getAllProductsByCate(2);
                $cateName = $category->getNameById(2);
                ?>
                <div class="section_title space_2 text-left">
                    <h3> <?php echo $cateName['0']['name']; ?> </h3>
                </div>
                <div class="best_selling_product_three owl-carousel">

                    <div class="best_selling_product">
                        <?php
                        $getProductsByCate = $product->getProductsByCate(2, 1, 3);
                        foreach ($getProductsByCate as $value):
                        ?>
                            <div class="single_small_product small_three">
                                <div class="product_thumb">
                                    <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price"><?php echo $value['price'] ?>,000₫</span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="best_selling_product">
                        <?php
                        $getProductsByCate = $product->getProductsByCate(2, 2, 3);
                        foreach ($getProductsByCate as $value):
                        ?>
                            <div class="single_small_product small_three">
                                <div class="product_thumb">
                                    <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price"><?php echo $value['price'] ?>,000₫</span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <?php
                $getAllProductsByCate = $product->getAllProductsByCate(3);
                $cateName = $category->getNameById(3);
                ?>
                <div class="section_title space_2 text-left">
                    <h3> <?php echo $cateName['0']['name']; ?> </h3>
                </div>
                <div class="best_selling_product_three owl-carousel">

                    <div class="best_selling_product">
                        <?php
                        $getProductsByCate = $product->getProductsByCate(3, 1, 3);
                        foreach ($getProductsByCate as $value):
                        ?>
                            <div class="single_small_product small_three">
                                <div class="product_thumb">
                                    <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price"><?php echo $value['price'] ?>,000₫</span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="best_selling_product">
                        <?php
                        $getProductsByCate = $product->getProductsByCate(3, 2, 3);
                        foreach ($getProductsByCate as $value):
                        ?>
                            <div class="single_small_product small_three">
                                <div class="product_thumb">
                                    <a href="product-details.php?product_id=<?php echo $value['id'] ?>">
                                        <img src="./assets/img/image/<?php echo $value['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                    <div class="product_ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product_price">
                                        <span class="regular_price"><?php echo $value['price'] ?>,000₫</span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
<!--Best seller product  end-->

</div>