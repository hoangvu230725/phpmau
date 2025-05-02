<?php
include "header.php";

?>
<!--breadcrumb area start-->
<div class="breadcrumb_container ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php">Home ></a>
                        </li>
                        <li>checkout</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->


<!--Checkout page section-->
<div class="Checkout_page_section">
    <div class="container">

        <div class="checkout-form">
            <form action="payout.php" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        <h3>Billing Details</h3>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['user'])) {
                                $getUser = $thanhvien->getUser($_SESSION['user']);
                                foreach ($getUser as $value): ?>
                                    <div class="col-lg-6 mb-30">
                                        <label for="fullname">Full Name <span>*</span></label>
                                        <input name="fullname" type="text" value="<?php echo $value['fullName'] ?>">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Address <span>*</span></label>
                                        <input name="address" type="text" value="<?php echo $value['address'] ?>">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label for="email">Email Address <span>*</span></label>
                                        <input name="email" type="text" value="<?php echo $value['email'] ?>">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label>Phone <span>*</span></label>
                                        <input name="phone" type="text" value="<?php echo $value['phone'] ?>">
                                    </div>
                                <?php endforeach;
                            } else { ?>
                                <div class="col-lg-6 mb-30">
                                    <label for="fullname">Full Name <span>*</span></label>
                                    <input name="fullname" type="text">
                                </div>
                                <div class="col-12 mb-30">
                                    <label>Address <span>*</span></label>
                                    <input name="address" type="text">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label for="email">Email Address <span>*</span></label>
                                    <input name="email" type="text">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Phone <span>*</span></label>
                                    <input name="phone" type="text">
                                </div>
                            <?php } ?>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea name="note" placeholder="Notes about your order"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">

                        <div class="order-wrapper">
                            <h3>Your order</h3>
                            <div class="order-table table-responsive mb-30">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                            if (isset($_SESSION['cart'])) {
                                                $sum = 0;
                                                foreach ($_SESSION['cart'] as $value):
                                                    $sum += $value['price'] * $value['quantity'];
                                            ?>
                                                <tr>
                                                    <td class="product-name"> <?php echo $value['name'] ?> <strong> × <?php echo $value['quantity'] ?></strong></td>
                                                    <td class="amount"> <?php echo $value['price'] * $value['quantity'] ?>,000₫</td>
                                                </tr>
                                        <?php endforeach;
                                            } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Order Total</th>
                                            <td><strong><?php echo $sum ?>,000₫ </strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="order-button">
                                    <button type="submit" name="order">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->

<!--organicfood wrapper start-->
<div class="footer_food_wrapper">
    <!-- footer start -->
    <footer class="footer pt-90 checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <!--Single Footer-->
                    <div class="single_footer widget">
                        <div class="single_footer_widget_inner">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/logo/logo_footer.png" alt=""></a>
                            </div>
                            <div class="footer_content">
                                <p>Address: 123 Main Street, Anytown, CA 12345 - USA.</p>
                                <p>Phone: +(000) 800 456 789</p>
                                <p>Email: Contact@posthemes.com</p>
                            </div>
                            <div class="footer_social">
                                <h4>Get in Touch:</h4>
                                <div class="footer_social_icon">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Footer-->
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="footer_menu_list d-flex justify-content-between">
                        <!--Single Footer-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_title">
                                    <h2>Products</h2>
                                </div>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">Prices drop</a></li>
                                        <li><a href="#"> New products</a></li>
                                        <li><a href="#"> Best sales</a></li>
                                        <li><a href="#"> Contact us</a></li>
                                        <li><a href="#"> My account</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Single footer end-->
                        <!--Single footer start-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_title">
                                    <h2>Login</h2>
                                </div>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">Sitemap</a></li>
                                        <li><a href="#"> Stores</a></li>
                                        <li><a href="#"> Login</a></li>
                                        <li><a href="#"> Contact us</a></li>
                                        <li><a href="#"> My account</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Single Footer end-->
                        <!--Single footer start-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_title">
                                    <h2> Your account </h2>
                                </div>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">Personal info</a></li>
                                        <li><a href="#"> Orders</a></li>
                                        <li><a href="#"> Login</a></li>
                                        <li><a href="#"> Credit slips</a></li>
                                        <li><a href="#"> Addresses</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Single Footer end-->
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <div class="footer_title">
                        <h2> Join Our Newsletter Now </h2>
                    </div>
                    <div class="footer_news_letter">
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <div class="newsletter_form">
                            <form action="#">
                                <input type="email" required placeholder="Your Email Address">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="copyright_text">
                            <p>Copyright 2018 <a href="#">Organicfood</a>. All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="footer_mastercard text-right">
                            <a href="#"><img src="assets/img/brand/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- footer end -->



</div>






<!--organicfood wrapper end-->

<?php
include "footer.php";
?>