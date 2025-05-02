<?php
include "header.php";




?>
<!--breadcrumb area start-->
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li><a href="index.php">Home ></a></li>
                        <li>Cart</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->
<div class="cart_main_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="update.php" method="post">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="img-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <?php
                            $sum = 0;
                            if (isset($_SESSION['cart'])):
                                foreach ($_SESSION["cart"] as $value):
                                    $sum +=$value['price'] * $value['quantity'];

                            ?>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail"><img src="./assets/img/image/<?php echo $value['image'] ?>" alt=""></td>
                                            <td class="product-name"><a href="product-details.php?product_id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></td>
                                            <td class="product-price"><span class="amount"><?php echo $value['price'] ?>,000₫</span></td>
                                            <td class="product-quantity">
                                                <div class="quickview_plus_minus quick_cart">
                                                    <div class="quickview_plus_minus_inner">
                                                        <div class="cart-plus-minus cart_page">
                                                            <input type="text" value="<?php echo $value['quantity'] ?>" name="so_luong<?php echo $value['id'] ?>" class="cart-plus-minus-box">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><?php echo $value['price'] * $value['quantity'] ?>,000₫</td>
                                            <td class="product-remove"><a href="delete.php?id=<?php echo $value['id'] ?>">X</a></td>
                                        </tr>

                                    </tbody>
                            <?php endforeach;
                            endif;
                            ?>
                        </table>
                    </div>
                    <div class="row table-responsive_bottom">
                        <div class="col-lg-7 col-sm-7 col-md-7">
                            <div class="buttons-carts">
                                <button type="submit" name="update">UPDATE CART</button>
                                <a href="shop.php">Go to Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5 col-md-5">
                            <div class="cart_totals  text-right">
                                <h2>Cart Totals</h2>
                                <div class="order-total">
                                    <span><strong>Total</strong> </span>
                                    <span><strong><?php echo $sum?>,000₫ </strong> </span>
                                </div>
                                <div class="wc-proceed-to-checkout">
                                    <a href="checkout.php">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>