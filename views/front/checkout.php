<?php
   include_once('../../app/controller.php');
   $controller = new Controller;
   
   if(!isset($_SESSION)) 
    { 
        session_start();
		if(empty($_SESSION['userId'])):
			header('location:login.php');
			exit(0);
        elseif(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0):
			header('location:index.php');
			exit(0);
        endif;
    }
?>
<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Ecomart - Fashion eCommerce HTML Template</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
   <!-- CSS here -->
   <link rel="stylesheet" href="<?=Controller::asset('front/css/preloader.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/bootstrap.min.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/meanmenu.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/animate.min.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/owl.carousel.min.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/swiper-bundle.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/backToTop.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/magnific-popup.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/ui-range-slider.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/nice-select.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/fontAwesome5Pro.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/flaticon.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/default.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/style.css');?>">
</head>
<body>
   <?php
      require_once dirname( __FILE__ ) . '/header.php';
      
   ?>
		<section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-title-wrapper text-center">
							<h1 class="page-title mb-10">Checkout</h1>
							<div class="breadcrumb-menu">
								<nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
									<ul class="trail-items">
										<li class="trail-item trail-begin">
											<a href="index.html"><span>Home</span></a>
										</li>
										<li class="trail-item trail-end"><span>Checkout</span></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- page title area end  -->
		<!-- coupon-area start -->
		<section class="coupon-area pt-100 pb-30">
			<div class="container container-small">
				<div class="row">
					<div class="col-md-12">
						<div class="coupon-accordion">
							<!-- ACCORDION START -->
							<h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
							<div class="coupon-checkout-content" id="checkout_coupon">
								<div class="coupon-info">
									<form action="#">
										<p class="checkout-coupon"><input placeholder="Coupon Code" type="text"> <button class="fill-btn" type="submit">Apply Coupon</button></p>
									</form>
								</div>
							</div><!-- ACCORDION END -->
						</div>
						<?php
							if(isset($_SESSION['success'])){
								echo '
								<div class="alert alert-dismissible alert-success fade show" role="alert">
									<strong>'.$_SESSION['success'].'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
								unset($_SESSION['success']);
							}elseif(isset($_SESSION['error'])){
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>'.$_SESSION['error'].'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>';
								unset($_SESSION['error']);
							}
						?>
					</div>
				</div>
			</div>
		</section><!-- coupon-area end -->
		<!-- checkout-area start -->
		<section class="checkout-area pb-70">
			<div class="container container-small">
				<form method="POST" action="<?=Controller::base_url('admin/OrderController.php');?>">
					<div class="row">
						<div class="col-lg-6">
							<div class="checkbox-form">
								<h3>Shipping Details</h3>
								<div class="row">
									<div class="col-md-12">
										<div class="checkout-form-list">
											<label>Address
                                                <span class="required">*</span>
                                            </label>
                                            <input <?php if(isset($_SESSION['session']) && $_SESSION['session']['address'] == null):echo 'class="border-danger"'; endif;?> placeholder="Street address" name="address" type="text" <?php if(isset($_SESSION['session'])):echo "value='".$_SESSION['session']['address']."'";;endif;?>>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>State
                                                <span class="required">*</span>
                                            </label> <input <?php if(isset($_SESSION['session']) && $_SESSION['session']['city'] == null):echo 'class="border-danger"'; endif;?> placeholder="city" name="city" type="text" <?php if(isset($_SESSION['session'])){echo "value='".$_SESSION['session']['city']."'";}?>/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Pincode
                                                <span class="required">*</span>
                                            </label>
                                            <input <?php if(isset($_SESSION['session']) && $_SESSION['session']['pincode'] == null):echo 'class="border-danger"'; endif;?> placeholder="Pincode" name="pincode" type="text" <?php if(isset($_SESSION['session'])):echo "value='".$_SESSION['session']['pincode']."'";endif;?>>
										</div>
									</div>
								</div>
                            </div>
						</div>
						<div class="col-lg-6">
							<div class="your-order mb-30">
								<h3>Your order details</h3>
								<div class="your-order-table table-responsive">
                                    <?php if(isset($_SESSION['cart'])):
                                        ?>
									<table>
										<thead>
											<tr>
												<th class="product-name">Product</th>
												<th class="product-total">Total</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
                                                $totalAmount = 0;
                                                foreach($_SESSION['cart'] as $key => $item){
                                                    $product = $controller->selectData('products','*' , array('id' => $key));
                                                    $totalAmount+= $product[0]['sellingprice']*$item['qty'];
                                                ?>
											<tr class="cart_item">
												<td class="product-name"><strong class="product-quantity"><?=$product[0]['name'].' × ' .$item['qty'];?></strong></td>
												<td class="product-total"><span class="amount"><?=$product[0]['sellingprice']*$item['qty'];?></span></td>
											</tr>
                                            <?php }?>
										</tbody>
										<tfoot>
											<tr class="cart-subtotal">
												<th>Cart Subtotal</th>
												<td><span class="amount"><?=$totalAmount;?></span></td>
											</tr>
											<tr class="shipping">
												<th>Shipping</th>
												<td>
													<ul>
														<li><label><span class="amount">Free</span></label></li>
													</ul>
												</td>
											</tr>
											<tr class="order-total">
												<th>Order Total</th>
												<td><strong><span class="amount"><?=$totalAmount;?></span></strong></td>
											</tr>
										</tfoot>
									</table>
                                    <?php endif;?>
								</div>
								<div class="payment-method">
								<ul class="">
									<li class="buttons">
										<input <?php if(isset($_SESSION['session']) && $_SESSION['session']['payment_type'] == null):echo 'class="border-danger"';endif?> type="radio" label="COD" name="payment_type" value="cod" <?php if(isset($_SESSION['session']) && $_SESSION['session']['payment_type'] == "cod"){echo "checked";}?>/>
										<input type="radio" label="PayU" name="payment_type" value="payu" <?php if(isset($_SESSION['session']) && $_SESSION['session']['payment_type'] == "payu"){echo "checked";}?>/>
									</li>
								</ul>
								</div>
								<div class="order-button-payment mt-20">
									<button class="fill-btn" name="placeOrderBtn" type="submit">Place order</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section><!-- checkout-area end -->
	</main>
    <?php
        require_once dirname( __FILE__ ) . '/footer.php';
		unset($_SESSION['session']);
    ?>
<!-- JS here -->
<script src="<?=Controller::asset('front/js/vendor/jquery-3.6.0.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/vendor/waypoints.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/meanmenu.js');?>"></script>
<script src="<?=Controller::asset('front/js/swiper-bundle.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/owl.carousel.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/magnific-popup.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/parallax.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/backToTop.js');?>"></script>
<script src="<?=Controller::asset('front/js/jquery-ui-slider-range.js');?>"></script>
<script src="<?=Controller::asset('front/js/nice-select.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/counterup.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/ajax-form.js');?>"></script>
<script src="<?=Controller::asset('front/js/wow.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/isotope.pkgd.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/imagesloaded.pkgd.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/main.js');?>"></script>
</body>
</html>