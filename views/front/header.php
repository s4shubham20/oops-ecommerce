<?php
    require_once "../../app/admin/CartController.php";
    $cart = new Cart;
?>
<!-- header area start  -->
<header class="header2">
    <div class="header-note">
        <p>Due to the <span>COVID 19</span> epidemic, orders may be processed with a slight delay</p>
        <span class="note-close-btn"><i class="flaticon-cancel"></i></span>
    </div>
    <div class="header-top d-none d-md-block">
        <div class="container header-container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="header-top-link">
                    <a href="about.html" class="text-btn">About Us</a>
                    <a href="register.html" class="text-btn">My account</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="header-top-right">
                    <a href="contact.html" class="text-btn">Track Order</a>
                    <select name="lan-select" id="lan-select" class="language-select border-left">
                    <option value="1">English</option>
                    <option value="2">Hindi</option>
                    <option value="3">Arabic</option>
                    <option value="3">Bengali</option>
                    <option value="3">French</option>
                    </select>
                    <select name="currency-select" id="currency-select" class="currency-select border-left">
                    <option value="1">USD</option>
                    <option value="2">EUR</option>
                    <option value="3">JPY</option>
                    <option value="4">GBP</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div id="header-sticky" class="header-main header-main1">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="header-main-content-wrapper">
                    <div class="header-main-left header-main-left-header1">
                    <div class="header-logo header1-logo">
                        <a href="index.html" class="logo-bl"><img src="<?=Controller::asset('front/img/logo/logo-bl-p.png');?>"
                                alt="logo-img"></a>
                    </div>
                    <div class="main-menu main-menu2 d-none d-lg-block">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="index.php">Home</a>
                                </li>
                                <?php 
                                    $categories = $controller->selectData("category" ,'*', array('status' => 1));
                                    foreach ($categories as $key => $value) {
                                        $subcategories = $controller->selectData('subcategories','*', array('category_id' => $value['id'], 'status' => 1));
                                        $products = $controller->selectData('products','*', array('category_id' => $value['id'], 'status' => 1));
                                        $brands = $controller->selectData('brands', '*', array('category_id' => $value['id'], 'status' => 1));
                                        if(isset($subcategories[0]) && isset($products[0])):
                                        ?> 
                                    <li class="menu-item-has-children"><a href="shop.html"><?=$value['name'];?></a>
                                    <ul class="sub-menu">
                                            <?php
                                                foreach($subcategories as $key => $item){
                                            ?>
                                        <li class="menu-item-has-children"><a href="shop.php?subCatId=<?=base64_encode($item['id']*1325412);?>"><?=$item['name'];?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                    foreach($brands as $key => $list){
                                                ?>
                                                <li><a href="shop-sidebar-5-column.html"><?=$list['name'];?></a></li>
                                                <?php }?>
                                            </ul>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </li>
                                <?php
                                    endif; 
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    </div>
                    <div class="header-main-right header-main-right-header1">
                    <div class="action-list d-none d-xl-flex action-list-header2">
                        <div class="action-item action-item-cart">
                            <a href="javascript:void(0)" class="view-cart-button">
                                <i class="fal fa-shopping-bag"></i>
                                <span class="action-item-number" id="cartcount"><?=$cart->totalProduct();?></span></a>
                            <a href="#" class="cart-items-price">$78.00</a>
                        </div>
                        <div class="action-item action-item-wishlist">
                            <a href="javascript:void(0)" class="view-wishlist-button">
                                <i class="fal fa-heart"></i>
                                <span class="action-item-number">2</span></a>
                        </div>
                        <div class="user-btn d-flex">
                            <?php 
                                if(empty($_SESSION['userId'])){
                            ?>
                            <a href="login.php">
                                <div class="user-icon">
                                <i class="flaticon-avatar"></i>

                                </div>
                                <span><span>Sign in</span>Account</span>
                            </a>
                            <?php }else{?>
                            <a href="javascript:void();" class="text-decoration-none text-muted">
                                <div class="user-icon">
                                    <i class="flaticon-avatar"></i>
                                </div>
                                <?php
                                    $user = $controller->selectData('users','*',array('id' => $_SESSION['userId']));
                                ?>
                                <div>
                                    <?=$user[0]['name'];?>
                                    <div>
                                        <a href="<?=Controller::base_url('admin/LoginController.php?logout=true');?>" class="text-decoration-none text-muted">Logout</a>
                                    </div>
                                </div>
                            </a>
                            <?php }?>
                        </div>
                    </div>
                    <div class="menu-bar d-xl-none ml-20">
                        <a class="side-toggle" href="javascript:void(0)">
                            <div class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="header-bottom d-none d-lg-block">
        <div class="container">
            <div class="header-bottom-inner">
                <div class="category-menu pos-rel">
                    <div class="category-click">
                        <div class="bar-icon bar-icon-2">
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                        <span>Category</span>
                    </div>
                    <div class="category-items">
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Shirts</div> <span class="category-items-number">8</span>
                        </a>
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Pants</div> <span class="category-items-number">12</span>
                        </a>
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Jackets</div> <span class="category-items-number">17</span>
                        </a>
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Leggings</div> <span class="category-items-number">6</span>
                        </a>
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Beachware</div> <span class="category-items-number">25</span>
                        </a>
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Underwear</div> <span class="category-items-number">17</span>
                        </a>
                        <a href="shop.html" class="category-item">

                        </a>
                        <a href="shop.html" class="category-item">
                        <div class="category-name">Belt</div> <span class="category-items-number">9</span>
                        </a>
                    </div>
                </div>
                <form action="#" class="filter-search-input header-search-2 d-none d-xl-inline-block">
                    <input type="text" placeholder="Search Products.....">
                    <button><i class="fal fa-search"></i></button>
                </form>
                <div class="header-support-social">
                    <div class="irc-item footer-support header-bottom-support">
                        <div class="irc-item-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="43.051" height="42.064"
                            viewBox="0 0 43.051 42.064">
                            <g id="customer-support2" transform="translate(-0.643 -1.361)">
                                <path id="Path_251" data-name="Path 51"
                                    d="M41.05,19.581a18.893,18.893,0,0,0-37.763,0A4.444,4.444,0,0,0,.643,23.639v4.985a4.445,4.445,0,0,0,4.44,4.44,2.876,2.876,0,0,0,2.873-2.873v-8.12a2.867,2.867,0,0,0-2.591-2.845,16.834,16.834,0,0,1,33.605,0,2.867,2.867,0,0,0-2.588,2.844V30.19a2.866,2.866,0,0,0,2.626,2.847V35.09a4.2,4.2,0,0,1-4.191,4.19h-3.1a3.085,3.085,0,0,0-2.929-2.085h-3.2a3.071,3.071,0,0,0-1.3.286,3.122,3.122,0,0,0-1.812,2.83,3.12,3.12,0,0,0,3.116,3.116h3.2a3.128,3.128,0,0,0,2.931-2.086h3.1a6.257,6.257,0,0,0,6.25-6.25V32.671a4.443,4.443,0,0,0,2.626-4.049V23.637a4.444,4.444,0,0,0-2.644-4.056ZM5.9,22.071V30.19A.814.814,0,0,1,5.082,31,2.384,2.384,0,0,1,2.7,28.623V23.638a2.383,2.383,0,0,1,2.381-2.381A.814.814,0,0,1,5.9,22.071ZM29.818,40.53a1.061,1.061,0,0,1-1.034.837h-3.2a1.056,1.056,0,0,1-.438-2.017,1.023,1.023,0,0,1,.438-.1h3.2a1.061,1.061,0,0,1,1.034,1.275ZM41.634,28.623A2.384,2.384,0,0,1,39.254,31a.814.814,0,0,1-.813-.813V22.071a.814.814,0,0,1,.813-.813,2.384,2.384,0,0,1,2.381,2.381Z"
                                    transform="translate(0 0)" fill="#171717"></path>
                                <path id="Path_252" data-name="Path 52"
                                    d="M33.629,33.546a4.368,4.368,0,0,0,4.363-4.363v-8.89a4.369,4.369,0,0,0-4.363-4.363H20.294a4.368,4.368,0,0,0-4.363,4.363v8.89a4.368,4.368,0,0,0,4.363,4.363h.082v2.3a2.139,2.139,0,0,0,2.136,2.145,2.094,2.094,0,0,0,1.507-.636l3.833-3.812ZM26.7,31.786l-4.148,4.125a.052.052,0,0,1-.071.016.069.069,0,0,1-.047-.078V32.516a1.03,1.03,0,0,0-1.03-1.03H20.295a2.306,2.306,0,0,1-2.3-2.3v-8.89a2.306,2.306,0,0,1,2.3-2.3H33.63a2.309,2.309,0,0,1,2.3,2.3v8.89a2.306,2.306,0,0,1-2.3,2.3h-6.2a1.031,1.031,0,0,0-.726.3Z"
                                    transform="translate(-4.793 -4.568)" fill="#171717"></path>
                                <path id="Path_253" data-name="Path 53"
                                    d="M24.019,26.787a1.519,1.519,0,1,0,1.521,1.519A1.522,1.522,0,0,0,24.019,26.787Z"
                                    transform="translate(-6.853 -7.972)" fill="#171717"></path>
                                <path id="Path_254" data-name="Path 54"
                                    d="M31.305,26.787a1.519,1.519,0,1,0,1.521,1.519A1.522,1.522,0,0,0,31.305,26.787Z"
                                    transform="translate(-9.137 -7.972)" fill="#171717"></path>
                                <path id="Path_255" data-name="Path 55"
                                    d="M38.591,26.787a1.519,1.519,0,1,0,1.521,1.519A1.522,1.522,0,0,0,38.591,26.787Z"
                                    transform="translate(-11.422 -7.972)" fill="#171717"></path>
                            </g>
                        </svg>

                        </div>
                        <div class="irc-item-content">
                        <div class="support-number"><a href="tel:555-900-888">555 - 900 - 888</a></div>
                        <p>24/7 Support Center</p>
                        </div>

                    </div>
                    <div class="social__links header-bottom-social">
                        <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- header area end -->
<main>
    <!-- side toggle start -->
<div class="fix">
   <div class="side-info">
      <div class="side-info-content">
         <div class="offset-widget offset-logo mb-40">
            <div class="row align-items-center">
               <div class="col-9">
                  <a href="index.html">
                     <img src="<?=Controller::asset('front/img/logo/logo-bl.png');?>" alt="Logo">
                  </a>
               </div>
               <div class="col-3 text-end"><button class="side-info-close"><i class="fal fa-times"></i></button>
               </div>
            </div>
         </div>
         <div class="mobile-menu d-lg-none fix"></div>
         <div class="offset-profile-action d-xl-none">
            <div class="offset-widget mb-40">
               <div class="action-list action-list-header1">
                  <div class="action-item action-item-cart">
                     <a href="javascript:void(0)" class="view-cart-button">
                        <i class="fal fa-shopping-bag"></i>
                        <span class="action-item-number" id="cartcount"><?=$cart->totalProduct();?></span></a>
                  </div>
                  <div class="action-item action-item-wishlist">
                     <a href="javascript:void(0)" class="view-wishlist-button">
                        <i class="fal fa-heart"></i>
                        <span class="action-item-number">2</span></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="offset-widget offset_searchbar mb-30">
            <form action="#" class="filter-search-input">
               <input type="text" placeholder="Search keyword">
               <button><i class="fal fa-search"></i></button>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="offcanvas-overlay"></div>
<div class="offcanvas-overlay-white"></div>

<div class="fix">
   <div class="sidebar-action sidebar-cart">
      <a class="close-sidebar" href="<?=Controller::base_url('admin/ManageCartController.php?emptycart=removeall');?>">Empty Cart<i class="fal fa-times"></i></a>
      <h4 class="sidebar-action-title">Shopping Cart</h4>
      <div class="sidebar-action-list">
         <?php
         if(isset($_SESSION['cart'])):
            $totalQuantity = 0;
            $totalAmount = 0;
            foreach($_SESSION['cart'] as $key => $item){
               $product = $controller->selectData('products', '*', array('id' => $key));
               $price = $product[0]['sellingprice'];
               $qty = $item['qty'];
               $totalQuantity += $qty;
               $totalAmount += $price*$qty
         ?>
         <div class="sidebar-list-item">
            <div class="product-image pos-rel">
               <a href="shop-details.html" class=""><img src="<?=Controller::asset($product[0]['image']);?>" alt="<?=$product[0]['alt'];?>"></a>
            </div>
            <div class="product-desc">
               <div class="product-name"><a href="shop-details.html"><?=$product[0]['name'];?></a></div>
               <div class="product-pricing">
               <span class="price-now"><?=$item['qty'];?></span>
                  <span class="item-number">&times;</span>
                  <span class="price-now"><?=$price?></span>
                  <br>
                  <b>Total Amount: </b>
                  <span class="price-now"><?=$qty*$price;?></span>
               </div>
               <a class="remove-item" href="<?=Controller::base_url('admin/ManageCartController.php?itemid='.base64_encode($key*41264872834762384));?>"><i class="fal fa-times"></i></a>
            </div>
         </div>
         <?php }
         endif;?>
      </div>
      <?php if(isset($_SESSION['cart'])):?>
        <div class="product-price-total">
            <span>Total Quantity: </span>
            <span class="subtotal-price"><?=$totalQuantity;?></span>
            <span>Subtotal :</span>
            <span class="subtotal-price"><?=$totalAmount;?></span>
        </div>
        <div class="sidebar-action-btn">
            <a href="cart.php" class="fill-btn">View cart</a>
            <a href="checkout.php" class="border-btn">Checkout</a>
        </div>
        <?php endif;?>
   </div>
</div>
<div class="fix">
   <div class="sidebar-action sidebar-wishlist">
      <button class="close-sidebar">Close<i class="fal fa-times"></i></button>
      <h4 class="sidebar-action-title">Wishlist</h4>
      <div class="sidebar-action-list">
        <?php
            if(isset($_SESSION['cart'])):
                $totalQuantity = 0;
                $totalAmount = 0;
                foreach($_SESSION['cart'] as $key => $item){
                $product = $controller->selectData('products', '*', array('id' => $key));
                $price = $product[0]['sellingprice'];
                $qty = $item['qty'];
                $totalQuantity += $qty;
                $totalAmount += $price*$qty
            ?>
         <div class="sidebar-list-item">
            <div class="product-image pos-rel">
               <a href="shop-details.html" class=""><img src="<?=Controller::asset('front/img/shirt/1/1.jpg');?>" alt="img"></a>
            </div>
            <div class="product-desc">
               <div class="product-name"><a href="shop-details.html">Women's Faux-Trim Shirt</a></div>
               <div class="product-pricing">
                  <span class="price-now">$20.00</span>
               </div>
               <button class="remove-item"><i class="fal fa-times"></i></button>
            </div>
         </div>
         <?php }
         endif;?>
      </div>
      <div class="product-price-total">
         <span>Subtotal :</span>
         <span class="subtotal-price">$44.00</span>
      </div>
      <div class="sidebar-action-btn">
         <a href="cart.html" class="fill-btn">View cart</a>
         <a href="cart.html" class="border-btn">Checkout</a>
      </div>
   </div>
</div>
<!-- side toggle end -->