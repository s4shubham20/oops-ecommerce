<?php
   include_once('../../app/controller.php');
   $controller = new Controller;
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
    $subCatId = base64_decode($_GET['subCatId'])/1325412;
    $subCategory = $controller->selectData('subcategories','*',array('id' => $subCatId));
    $product = $controller->selectData('products','*',array('subcategory_id' => $subCatId), 'id');
   ?>
<!-- banner area start  -->
<div class="fix">
<div class="sidebar-action sidebar-filter">
    <button class="close-sidebar">Close<i class="fal fa-times"></i></button>
    <h4 class="sidebar-action-title">Filter Items</h4>
    <div class="product-filters mb-0">
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Search</h4>
            <div class="filter-widget-content">
                <div class="filter-widget-search">
                <input type="text" placeholder="Search here..">
                <button type="submit"><i class="fal fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Category</h4>
            <div class="filter-widget-content">
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
                    <div class="category-name">Bag</div> <span class="category-items-number">15</span>
                </a>
                <a href="shop.html" class="category-item">
                    <div class="category-name">Belt</div> <span class="category-items-number">9</span>
                </a>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Size</h4>
            <div class="filter-widget-content">
                <div class="category-sizes">
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-ex-s">
                    <label class="check-label" for="s-ex-s">Extra Small</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-sm">
                    <label class="check-label" for="s-sm">Small</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-md">
                    <label class="check-label" for="s-md">Medium</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-large">
                    <label class="check-label" for="s-large">Large</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-ex-l">
                    <label class="check-label" for="s-ex-l">Extra Large</label>
                </div>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Rating</h4>
            <div class="filter-widget-content">
                <div class="category-ratings">
                <div class="category-rating">
                    <input class="radio-box" type="radio" id="s-st-5" name="rating">
                    <label class="radio-star" for="s-st-5">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="category-rating">
                    <input class="radio-box" type="radio" id="s-st-4" name="rating">
                    <label class="radio-star" for="s-st-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                    </label>
                </div>
                <div class="category-rating">
                    <input class="radio-box" type="radio" id="s-st-3" name="rating">
                    <label class="radio-star" for="s-st-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                    </label>
                </div>
                <div class="category-rating">
                    <input class="radio-box" type="radio" id="s-st-2" name="rating">
                    <label class="radio-star" for="s-st-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                    </label>
                </div>
                <div class="category-rating">
                    <input class="radio-box" type="radio" id="s-st-1" name="rating">
                    <label class="radio-star" for="s-st-1">
                        <i class="fas fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                        <i class="fal fa-star"></i>
                    </label>
                </div>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Colour</h4>
            <div class="filter-widget-content">
                <div class="category-colours">
                <div class="category-color">
                    <ul class="product-color-nav">
                        <li class="cl-pink active">
                            <img src="assets/img/product/product-img1.jpg" alt="img">
                        </li>
                        <li class="cl-black">
                            <img src="assets/img/product/product-img2.jpg" alt="img">
                        </li>
                        <li class="cl-blue">
                            <img src="assets/img/product/product-img3.jpg" alt="img">
                        </li>
                        <li class="cl-red">
                            <img src="assets/img/product/product-img4.jpg" alt="img">
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Brand</h4>
            <div class="filter-widget-content">
                <div class="category-brands">
                <div class="category-brand">
                    <input class="check-box" type="checkbox" id="s-b-next">
                    <label class="check-label" for="s-b-next">Next</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-b-ri">
                    <label class="check-label" for="s-b-ri">River Island</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-b-geox">
                    <label class="check-label" for="s-b-geox">Geox</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-b-eco">
                    <label class="check-label" for="s-b-eco">Ecomart</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-b-abby">
                    <label class="check-label" for="s-b-abby">Abby</label>
                </div>
                <div class="category-size">
                    <input class="check-box" type="checkbox" id="s-b-nike">
                    <label class="check-label" for="s-b-nike">Nike</label>
                </div>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Price</h4>
            <div class="filter-widget-content">
                <div class="filter-price">
                <div class="slider-range">
                    <div class="slider-range-bar"></div>
                    <p>
                        <label for="s-amount">Price :</label>
                        <input type="text" id="s-amount" class="amount" readonly>
                    </p>
                </div>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="filter-widget-title drop-btn">Tags</h4>
            <div class="filter-widget-content">
                <div class="category-tags">
                <a href="#" class="category-tag">Fashion</a>
                <a href="#" class="category-tag">Hats</a>
                <a href="#" class="category-tag">Sandal</a>
                <a href="#" class="category-tag">Bags</a>
                <a href="#" class="category-tag">Snacker</a>
                <a href="#" class="category-tag">Denim</a>
                <a href="#" class="category-tag">Sunglasses</a>
                <a href="#" class="category-tag">Beachwear</a>
                <a href="#" class="category-tag">Vagabond</a>
                <a href="#" class="category-tag">Trend</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- side toggle end -->

    <!-- page title area start  -->
    <section class="page-title-area" data-background="<?=Controller::asset('front/img/bg/page-title-bg.jpg');?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-wrapper text-center">
                        <h1 class="page-title mb-10">Shop</h1>
                        <div class="breadcrumb-menu">
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                            <ul class="trail-items">
                                <li class="trail-item trail-begin"><a href="index.php"><span>Home</span></a></li>
                                <li class="trail-item trail-end"><span><?=$subCategory[0]['name'];?></span></li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end  -->

    <!-- shop main area start  -->
    <div class="shop-main-area pt-120 pb-10">
    <div class="container">
    <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12">
            <div class="shop-main-wrapper mb-60">
                <div class="shop-main-wrapper-head mb-30">
                <div class="swowing-list">Showing <span><?=count($product);?></span> Products</div>
                <div class="sort-type-filter">
                    <div class="sorting-type">
                        <span>Sort by : </span>
                        <select class="sorting-list" name="sorting-list" id="sorting-list">
                            <option value="1">Newly Added</option>
                            <option value="2">Most popular</option>
                            <option value="3">Trending</option>
                            <option value="4">Price (High to Low)</option>
                            <option value="5">Price (Low to High)</option>
                        </select>
                    </div>
                    <div class="action-item action-item-filter d-lg-none">
                        <a href="javascript:void(0)" class="view-filter-button">
                            <i class="flaticon-filter"></i>
                        </a>
                    </div>
                </div>
                </div>
                <div class="products-wrapper" id="productSort">
                    <?php
                        if(isset($product[0])){
                            foreach($product as $key => $item){
                    ?>
                    <div class="single-product">
                        <div class="product-image pos-rel">
                            <a href="shop-details.php?productid=<?=base64_encode($item['id']*356484541);?>" class=""><img src="<?=Controller::asset($item['image']);?>" alt="img"></a>
                            <div class="product-action">
                                <a href="#" class="quick-view-btn"><i class="fal fa-eye"></i></a>
                                <a href="#" class="wishlist-btn"><i class="fal fa-heart"></i></a>
                                <a href="#" class="compare-btn"><i class="fal fa-exchange"></i></a>
                            </div>
                            <div class="product-action-bottom">
                                <a href="javascript:void(0);" onclick="add_to_cart('<?=$item['id'];?>', 'add')" class="add-cart-btn"><i class="fal fa-shopping-bag"></i>Add to
                                Cart</a>
                            </div>
                            <div class="product-sticker-wrapper">
                                <span class="product-sticker new">New</span>
                            </div>
                        </div>
                        <div class="product-desc">
                            <div class="product-name"><a href="shop-details.php?productid=<?=base64_encode($item['id']*356484541);?>"><?=$item['name'];?></a></div>
                            <div class="product-price">
                                <span class="price-now"><?=$item['sellingprice'];?></span>
                                <span class="price-old"><?=$item['price'];?></span>
                            </div>
                            <ul>
                                <li class="buttons">
                                    <?php
                                        $json = json_decode($item['size'], true);
                                        foreach ($json as $key => $value) {
                                    ?>
                                        <input type="radio" name="size" label="<?=$value;?>"  id="productSize" value="<?=$value;?>"/>
                                    <?php }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="sidebar-widget-wrapper mb-110 d-none d-lg-block">
                <div class="product-filters mb-50">
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Search</h4>
                    <div class="filter-widget-content">
                        <div class="filter-widget-search">
                            <input type="text" placeholder="Search here..">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </div>

                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Category</h4>
                    <div class="filter-widget-content">
                        <div class="category-items">
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Shirts</div> <span class="category-items-number">8</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Pants</div> <span class="category-items-number">12</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Jackets</div> <span
                                class="category-items-number">17</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Leggings</div> <span
                                class="category-items-number">6</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Beachware</div> <span
                                class="category-items-number">25</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Underwear</div> <span
                                class="category-items-number">17</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Bag</div> <span class="category-items-number">15</span>
                            </a>
                            <a href="shop.html" class="category-item">
                            <div class="category-name">Belt</div> <span class="category-items-number">9</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Size</h4>
                    <div class="filter-widget-content">
                        <div class="category-sizes">
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="ex-s">
                            <label class="check-label" for="ex-s">Extra Small</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="sm">
                            <label class="check-label" for="sm">Small</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="md">
                            <label class="check-label" for="md">Medium</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="large">
                            <label class="check-label" for="large">Large</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="ex-l">
                            <label class="check-label" for="ex-l">Extra Large</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Rating</h4>
                    <div class="filter-widget-content">
                        <div class="category-ratings">
                            <div class="category-rating">
                            <input class="radio-box" type="radio" id="st-5" name="rating">
                            <label class="radio-star" for="st-5">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </label>
                            </div>
                            <div class="category-rating">
                            <input class="radio-box" type="radio" id="st-4" name="rating">
                            <label class="radio-star" for="st-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </label>
                            </div>
                            <div class="category-rating">
                            <input class="radio-box" type="radio" id="st-3" name="rating">
                            <label class="radio-star" for="st-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                            </label>
                            </div>
                            <div class="category-rating">
                            <input class="radio-box" type="radio" id="st-2" name="rating">
                            <label class="radio-star" for="st-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                            </label>
                            </div>
                            <div class="category-rating">
                            <input class="radio-box" type="radio" id="st-1" name="rating">
                            <label class="radio-star" for="st-1">
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                                <i class="fal fa-star"></i>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Colour</h4>
                    <div class="filter-widget-content">
                        <div class="category-colours">
                            <div class="category-color">
                            <ul class="product-color-nav">
                                <li class="cl-pink active">
                                    <img src="assets/img/product/product-img1.jpg" alt="img">
                                </li>
                                <li class="cl-black">
                                    <img src="assets/img/product/product-img2.jpg" alt="img">
                                </li>
                                <li class="cl-blue">
                                    <img src="assets/img/product/product-img3.jpg" alt="img">
                                </li>
                                <li class="cl-red">
                                    <img src="assets/img/product/product-img4.jpg" alt="img">
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Brand</h4>
                    <div class="filter-widget-content">
                        <div class="category-brands">
                            <div class="category-brand">
                            <input class="check-box" type="checkbox" id="b-next">
                            <label class="check-label" for="b-next">Next</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="b-ri">
                            <label class="check-label" for="b-ri">River Island</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="b-geox">
                            <label class="check-label" for="b-geox">Geox</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="b-eco">
                            <label class="check-label" for="b-eco">Ecomart</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="b-abby">
                            <label class="check-label" for="b-abby">Abby</label>
                            </div>
                            <div class="category-size">
                            <input class="check-box" type="checkbox" id="b-nike">
                            <label class="check-label" for="b-nike">Nike</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Price</h4>
                    <div class="filter-widget-content">
                        <div class="filter-price">
                            <div class="slider-range">
                            <div class="slider-range-bar"></div>
                            <p>
                                <label for="amount">Price :</label>
                                <input type="text" id="amount" class="amount" readonly>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="filter-widget-title drop-btn">Tags</h4>
                    <div class="filter-widget-content">
                        <div class="category-tags">
                            <a href="#" class="category-tag">Fashion</a>
                            <a href="#" class="category-tag">Hats</a>
                            <a href="#" class="category-tag">Sandal</a>
                            <a href="#" class="category-tag">Bags</a>
                            <a href="#" class="category-tag">Snacker</a>
                            <a href="#" class="category-tag">Denim</a>
                            <a href="#" class="category-tag">Sunglasses</a>
                            <a href="#" class="category-tag">Beachwear</a>
                            <a href="#" class="category-tag">Vagabond</a>
                            <a href="#" class="category-tag">Trend</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- shop main area end  -->
<!-- features area end  -->
</main>
<?php
    require_once dirname( __FILE__ ) . '/footer.php';
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
<script>
   function add_to_cart(pid, type){
      try {
         const qty = 1;
         let sizeChart = document.querySelector('#productSize:checked').value;
         //console.log("Test "+sizeChart);
         if(sizeChart == '') throw "empty";
         $.ajax({
            url:"<?=Controller::base_url('admin/ManageCartController.php');?>",
            type:'post',
            data:{_pid:pid,_type:type,_qty:qty,_sizeChart:sizeChart},
            success:function(response){
               if(type == 'remove'){
                  window.location.reload();
               }
               $("#cartcount").html(response);
               window.location.href='cart.php';
            }
         });
      }
      catch(err) {
         alert("Please select size first !");
      }
  }

  $(document).ready(function() {
    $("#sorting-list").on('change', function() {
        let sort = document.getElementById("sorting-list");
        let singleProduct = document.getElementById("productSort");
        let sortValue = sort.value;
        let subCategoryId = '<?=$_GET['subCatId'];?>';
        $.ajax({
            type:'post',
            url:'<?=Controller::base_url('admin/AjaxController.php')?>',
            data:{sortValue:sortValue,subCategoryId:subCategoryId},
            success:function(res){
                singleProduct.innerHTML = res;
            }
        });
    });
  });
</script>
</body>
</html>