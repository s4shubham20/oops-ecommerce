<?php
   include_once('../../app/controller.php');
   $controller = new Controller;
   
   if(!isset($_SESSION)) 
    { 
        session_start(); 
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0):
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
      <!-- page title area start  -->
      <section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="page-title-wrapper text-center">
                     <h1 class="page-title mb-10">Login</h1>
                     <div class="breadcrumb-menu">
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                           <ul class="trail-items">
                              <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                              <li class="trail-item trail-end"><span>Login</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- page title area end  -->

      <!-- register area start  -->
      <div class="register-area pt-120 pb-120">
         <div class="container container-small">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                  <div class="signup-form-wrapper">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="signup-wrapper">
                                    <input placeholder="First Name" name="fname" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="signup-wrapper">
                                    <input placeholder="Last Name" name="lname" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="signup-wrapper">
                                    <input placeholder="Email" name="email" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="signup-wrapper">
                                    <input placeholder="Mobile" name="mobile" type="number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="signup-wrapper">
                                    <input placeholder="Password" name="password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="sing-buttom mb-20">
                        <button class="sing-btn">Register now</button>
                        </div>
                    </form>
                     <div class="registered wrapper">
                        <div class="not-register">
                           <span>Already signed up</span><span><a href="login.php">Login</a></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- register area end  -->
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
</body>
</html>