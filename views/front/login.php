<?php
   include_once('../../app/controller.php');
   $controller = new Controller;
   
   if(!isset($_SESSION)) 
    { 
        session_start(); 
        if(isset($_SESSION['userId'])){
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
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
               <form method="post" action="<?php echo Controller::base_url('admin/LoginController.php');?>">
                  <div class="signup-form-wrapper">
                     <div class="signup-wrapper">
                        <input type="email" name="email" placeholder="Email or Username"/>
                     </div>
                     <div class="signup-wrapper">
                        <input type="password" placeholder="Password" name="password"/>
                     </div>
                     <div class="sing-buttom mb-20">
                        <button class="sing-btn" name="loginBtn" type="submit">Login</button>
                     </div>
                     <div class="registered wrapper">
                        <div class="not-register">
                           <span>Not registered?</span><span><a href="register.php">Sign up</a></span>
                        </div>
                        <div class="forget-password">
                           <a href="#">Forgot password?</a>
                        </div>
                     </div>
                  </div>
               </form>
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