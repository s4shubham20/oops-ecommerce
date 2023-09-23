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
   <link rel="stylesheet" href="<?= Controller::asset('front/css/preloader.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/bootstrap.min.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/meanmenu.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/animate.min.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/owl.carousel.min.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/swiper-bundle.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/backToTop.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/magnific-popup.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/ui-range-slider.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/nice-select.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/fontAwesome5Pro.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/flaticon.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/default.css'); ?>">
   <link rel="stylesheet" href="<?= Controller::asset('front/css/style.css'); ?>">
   <style>
      .page-title-area {
         height: 250px;
      }

      span.mt-17 {
         margin-top: 17px;
      }
      div #sizeError{
         background: #171717;
         color: #fff;
         font-size: 18px;
         padding: 2px 18px;
         margin: 0px 4px;
         border-radius: 5px;
         margin-top: 15px;
      }
      div #sizeError::selection{
         color: #171717;
         background: #fff;
      }
   </style>
</head>

<body>
   <?php
   require_once dirname(__FILE__) . '/header.php';
   ?>
   <!-- page title area start  -->
   <?php
   $id = base64_decode($_GET['productid']) / 356484541;
   $product = $controller->selectData('products', '*', array('id' => $id));
   ?>
   <!-- page title area start  -->
   <section class="page-title-area" data-background="<?= Controller::asset('front/img/bg/page-title-bg.jpg'); ?>">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="page-title-wrapper text-center">
                  <h1 class="page-title mb-10">Shop</h1>
                  <div class="breadcrumb-menu">
                     <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items">
                           <li class="trail-item trail-begin"><a href="index.php"><span>Home</span></a></li>
                           <li class="trail-item trail-end"><span><?= $product[0]['name']; ?></span></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- page title area end  -->

   <!-- shop details area start  -->
   <section class="shop-details-area pt-120 pb-90">
      <div class="container container-small">
         <div class="row">
            <div class="col-lg-6">
               <?php
               $productImages = $controller->selectData('productimages', '*', array('product_id' => $id));
               if (isset($productImages[0])) {
               ?>
                  <div class="product-details-tab-wrapper mb-30">
                     <div class="product-details-tab">
                        <div class="tab-content" id="productDetailsTab">
                           <?php
                           foreach ($productImages as $key => $item) {
                           ?>
                              <div class="tab-pane fade <?php if ($key == 0) : echo 'active show';
                                                         endif; ?>" id="pro-<?= $key; ?>" role="tabpanel" aria-labelledby="pro-2-tab<?= $key; ?>">
                                 <img class="active" src="<?= Controller::asset($item['image']); ?>" alt="<?= $product[0]['alt']; ?>">
                              </div>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="product-details-nav">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <?php
                           foreach ($productImages as $key => $item) {
                           ?>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link <?php if ($key == 0) : echo 'active'; endif; ?>" id="pro-2-tab<?= $key; ?>" data-bs-toggle="tab" data-bs-target="#pro-<?= $key; ?>" type="button" role="tab" aria-controls="pro-<?= $key; ?>" aria-selected="<?php if ($key == 0) : echo 'true'; else : echo 'false';endif; ?>">
                                    <img src="<?= Controller::asset($item['image']); ?>" alt="<?= $product[0]['alt']; ?>">
                                 </button>
                              </li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               <?php } else { ?>
                  <div class="product-details-tab-wrapper mb-30">
                     <div class="product-details-tab">
                        <div class="tab-content" id="productDetailsTab">
                           <div class="tab-pane fade active show" id="pro-1" role="tabpanel" aria-labelledby="pro-2-tab1">
                              <img class="active" src="<?= Controller::asset($product[0]['image']); ?>" alt="<?= $product[0]['alt']; ?>">
                           </div>
                        </div>
                     </div>
                     <div class="product-details-nav">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pro-2-tab1" data-bs-toggle="tab" data-bs-target="#pro-1" type="button" role="tab" aria-controls="pro-1" aria-selected="true">
                                 <img src="<?= Controller::asset($product[0]['image']); ?>" alt="<?= $product[0]['alt']; ?>">
                              </button>
                           </li>
                        </ul>
                     </div>
                  </div>
               <?php } ?>
            </div>
            <div class="col-lg-6">
               <div class="product-side-info mb-30">
                  <h4 class="product-name mb-10"><?= $product[0]['name']; ?></h4>
                  <span class="product-price"><?= ceil($product[0]['sellingprice']); ?></span>

                  <p class="mb-30"><?= $product[0]['short_desc']; ?></p>
                  <div class="available-sizes">
                     <span class="mt-17">Available Sizes : </span>
                     <ul class="">
                        <li class="buttons">
                           <?php
                           $size = json_decode($product[0]['size'], true);
                           foreach ($size as $key => $value) {
                           ?>
                              <input type="radio" name="size" label="<?= $value; ?>" id="productSize" value="<?= $value; ?>" />
                           <?php } ?>
                        </li>
                        <li class="mt-10">
                           <span id="sizeError" class="d-none">Please select a Size to proceed</span>
                        </li>
                     </ul>
                  </div>
                  <div class="product-quantity-cart mb-25">
                     <div class="product-quantity-form">
                        <form action="#">
                           <button class="cart-minus" id="minus" value="0"><i class="far fa-minus"></i></button>
                           <input class="cart-input quantityinput" id="productQty" type="number" max="5" min="1" value="1" readonly>
                           <button class="cart-plus" id="plus" value="1"><i class="far fa-plus"></i></button>
                        </form>
                     </div>
                     <a href="javascript:void();" onclick="add_to_cart('<?= $product[0]['id']; ?>', 'add')" class="fill-btn">Add to Cart</a>
                  </div>
                  <a href="wishlist.html" class="border-btn">Add to Wishlist</a>
                  <div class="product__details__tag tagcloud mt-25 mb-10"><span>Tags : </span>
                     <a href="#" rel="tag">Shirt</a>
                     <a href="#" rel="tag">Cotton</a>
                     <a href="#" rel="tag">Smart</a>
                     <a href="#" rel="tag">Fashion</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="product_info-faq-area pb-0">
            <div class="">
               <nav class="product-details-nav">
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link show" id="nav-general-tab" data-bs-toggle="tab" href="#nav-general" role="tab" aria-selected="false">Description</a>
                     <a class="nav-item nav-link active" id="nav-seller-tab" data-bs-toggle="tab" href="#nav-seller" role="tab" aria-selected="true">Reviews</a>
                  </div>
               </nav>
               <div class="tab-content product-details-content" id="nav-tabContent">
                  <div class="tab-pane fade" id="nav-general" role="tabpanel">
                     <div class="tabs-wrapper mt-35">
                        <div class="product__details-des">
                           <p><?= $product[0]['description']; ?>.</p>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade active show" id="nav-seller" role="tabpanel">
                     <div class="tabs-wrapper mt-35">
                        <div class="course-review-item mb-30">
                           <div class="course-reviews-img">
                              <a href="#"><img src="assets/img/testimonial/course-reviews-1.png" alt="image not found"></a>
                           </div>
                           <div class="course-review-list">
                              <h5><a href="#">Sotapdi Kunda</a></h5>
                              <div class="course-start-icon">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <span>55 min ago</span>
                              </div>
                              <p>Very clean and organized with easy to follow tutorials, Exercises, and
                                 solutions.
                                 This course does start from the beginning with very little knowledge and
                                 gives a
                                 great overview of common tools used for data science and progresses into
                                 more
                                 complex concepts and ideas.</p>
                           </div>
                        </div>
                        <div class="course-review-item mb-30">
                           <div class="course-reviews-img">
                              <a href="#"><img src="assets/img/testimonial/course-reviews-2.png" alt="image not found"></a>
                           </div>
                           <div class="course-review-list">
                              <h5><a href="#">Samantha</a></h5>
                              <div class="course-start-icon">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <span>45 min ago</span>
                              </div>
                              <p>The course is good at explaining very basic intuition of the concepts. It
                                 will get
                                 you scratching the surface so to say. where this course is unique is the
                                 implementation methods are so well defined Thank you to the team !.</p>
                           </div>
                        </div>
                        <div class="course-review-item mb-30">
                           <div class="course-reviews-img">
                              <a href="#"><img src="assets/img/testimonial/course-reviews-3.png" alt="image not found"></a>
                           </div>
                           <div class="course-review-list">
                              <h5><a href="#">Michell Mariya</a></h5>
                              <div class="course-start-icon">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <span>30 min ago</span>
                              </div>
                              <p>This course is amazing..!
                                 I started this course as a beginner and learnt a lot. Instructors are great.
                                 Query
                                 handling can be improved.Overall very happy with the course.</p>
                           </div>
                        </div>
                        <div class="product__details-comment ">
                           <div class="comment-title mb-20">
                              <h3>Add a review</h3>
                              <p>Your email address will not be published. Required fields are marked *</p>
                           </div>
                           <div class="comment-rating mb-20">
                              <span>Overall ratings</span>
                              <ul>
                                 <li><a href="#"><i class="fas fa-star"></i></a></li>
                                 <li><a href="#"><i class="fas fa-star"></i></a></li>
                                 <li><a href="#"><i class="fas fa-star"></i></a></li>
                                 <li><a href="#"><i class="fas fa-star"></i></a></li>
                                 <li><a href="#"><i class="fal fa-star"></i></a></li>
                              </ul>
                           </div>
                           <div class="comment-input-box mb-20">
                              <form action="#">
                                 <div class="row">
                                    <div class="col-xxl-12">
                                       <textarea placeholder="Your review" class="comment-input comment-textarea mb-20"></textarea>
                                    </div>
                                    <div class="col-xxl-6">
                                       <div class="comment-input mb-20">
                                          <input type="text" placeholder="Your Name">
                                       </div>
                                    </div>
                                    <div class="col-xxl-6">
                                       <div class="comment-input mb-20">
                                          <input type="email" placeholder="Your Email">
                                       </div>
                                    </div>
                                    <div class="col-xxl-12">
                                       <div class="comment-submit">
                                          <button type="submit" class="fill-btn">Submit</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- shop details area end  -->

   <div class="related_product pb-70">
      <div class="container container-small">
         <div class="section-title mb-55">
            <h2>Recent Product</h2>
         </div>
         <!-- Slider main container -->
         <div class="swiper-container r-product-active">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                  <?php 
                     $recentProdcut = $controller->selectData('products','*','','id');
                        foreach($recentProdcut as $key => $item){
                           if($item['id'] != $product[0]['id']){
                  ?>
               <div class="swiper-slide">
                  <div class="single-product">
                     <div class="product-image pos-rel">
                        <a href="shop-details.php?productid=<?=base64_encode($item['id']*356484541);?>" class=""><img src="<?=Controller::asset($item['image']);?>" alt="img"></a>
                        <div class="product-action">
                           <a href="#" class="quick-view-btn"><i class="fal fa-eye"></i></a>
                           <a href="#" class="wishlist-btn"><i class="fal fa-heart"></i></a>
                           <a href="#" class="compare-btn"><i class="fal fa-exchange"></i></a>
                        </div>
                        <div class="product-action-bottom">
                           <a href="javascript:void();" onclick="add_to_cart('<?=$item['id'];?>', 'add');" class="add-cart-btn"><i class="fal fa-shopping-bag"></i>Add to
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
                        </div>
                        <ul>
                           <li class="buttons">
                              <?php
                                 if(isset($item['size'])){
                                    $size = json_decode($item['size'], true);
                                    foreach($size as $key => $value){?>
                                       <input  name="size" label="<?=$value;?>"  id="productSize"  type="radio" value="<?=$value?>">
                              <?php
                                    }
                                 }
                              ?>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
                  <?php 
                     }
                  }?>
            </div>
         </div>
      </div>
   </div>
   </main>
   <?php
   require_once dirname(__FILE__) . '/footer.php';
   ?>
   <!-- JS here -->
   <script src="<?= Controller::asset('front/js/vendor/jquery-3.6.0.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/vendor/waypoints.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/bootstrap.bundle.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/meanmenu.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/swiper-bundle.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/owl.carousel.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/magnific-popup.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/parallax.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/backToTop.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/jquery-ui-slider-range.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/nice-select.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/counterup.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/ajax-form.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/wow.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/isotope.pkgd.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/imagesloaded.pkgd.min.js'); ?>"></script>
   <script src="<?= Controller::asset('front/js/main.js'); ?>"></script>
   <script>
      function add_to_cart(pid, type) {
         try {
            let qty = document.getElementById("productQty").value;
            let sizeChart = document.querySelector("#productSize:checked").value;
            const sizeError = document.getElementById("sizeError");
            console.log(sizeChart);
            if (sizeChart == '') throw "empty";
            $.ajax({
               url: "<?= Controller::base_url('admin/ManageCartController.php'); ?>",
               type: 'post',
               data: {
                  _pid: pid,
                  _type: type,
                  _qty: qty,
                  _sizeChart: sizeChart
               },
               success: function(response) {
                  if (type == 'remove') {
                     window.location.reload();
                  }
                  $("#cartcount").html(response);
                  window.location.href = 'cart.php';
               }
            });
         } catch (err) {
            sizeError.classList.remove("d-none");
         }
      }
   </script>
</body>

</html>