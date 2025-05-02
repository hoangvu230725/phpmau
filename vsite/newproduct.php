				 <!--New product area-->
				 <div class="new_product new_product_three">
				 	<div class="container">
				 		<div class="row">
				 			<div class="col-12">
				 				<div class="section_title space_2 text-left">
				 					<h3>New Product</h3>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="row">
				 			<div class="features_product_active_four owl-carousel owl-loaded owl-drag">
				 				<?php
									$getNewProducts = $product->getNewProducts(1, 5);
									foreach ($getNewProducts as $value):
									?>
				 					<div class="col-lg-2">
				 						<div class="single__product">
				 							<div class="single_product__inner">
				 								<span class="new_badge">new</span>
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
				 				<?php endforeach ?>
				 			</div>
				 		</div>
				 	</div>
				 </div>
				 <!--new product end-->