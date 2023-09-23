<?php
    session_start();
    include('../../app/controller.php');
    if(Controller::SessionExist() == true){
        header('location:../back/admin/index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Admin Registration</title>

    <link rel="icon" href="<?=Controller::asset('back/images/favicon.ico');?>" type="image/x-icon">
    <!-- Google font-->     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/css/bootstrap/css/bootstrap.min.css');?>">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?=Controller::asset('back/pages/waves/css/waves.min.css');?>" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/icon/themify-icons/themify-icons.css');?>">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/icon/icofont/css/icofont.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/icon/font-awesome/css/font-awesome.min.css');?>">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/css/style.css');?>">
</head>

<body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" method="post" action="../../app/admin/RegisterController.php">
                        <div class="text-center">
                            <img src="../../assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up</h3>
                                    </div>
                                </div>
                                <?php
                                    if(isset($_SESSION['error'])){
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>'.$_SESSION["error"].'</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>';
                                        unset($_SESSION['error']);
                                    }
                                ?>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" value="<?php if(isset($_SESSION['oldname'])){echo $_SESSION['oldname'];unset($_SESSION['oldname']);}?>">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Choose Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" value="<?php if(isset($_SESSION['oldemail'])){echo $_SESSION['oldemail'];unset($_SESSION['oldemail']);}?>">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Email Address</label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="confirmpassword" class="form-control">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="registerBtn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="login.php"><b>Login</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="../../assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <script type="text/javascript" src="<?=Controller::asset('back/js/jquery/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/jquery-ui/jquery-ui.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/popper.js/popper.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- waves js -->
    <script src="<?=Controller::asset('back/pages/waves/js/waves.min.js');?>"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?=Controller::asset('back/js/jquery-slimscroll/jquery.slimscroll.js');?>"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?=Controller::asset('back/js/SmoothScroll.js');?>"></script>
    <script src="<?=Controller::asset('back/js/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script type="text/javascript" src="<?=Controller::asset('back/js/common-pages.js');?>"></script>
</body>
</html>
