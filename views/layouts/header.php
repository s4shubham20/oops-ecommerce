<?php
    if(basename($_SERVER['PHP_SELF'])== 'header.php'){
       exit();
    }
    session_start();
    ob_start();
    include_once('../../../app/controller.php');
    if(Controller::SessionEmpty() == true){
        header('location:../../auth/login.php');
        exit(0);
    }
    $controller = new Controller();
    $condition =array('email' =>$_SESSION['email']);
    $userName = $controller->selectData('users','*', $condition);
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Mega Able bootstrap admin template by codedthemes </title>
    <link rel="icon" href="<?=Controller::asset('images/favicon.ico');?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?=Controller::asset('back/pages/waves/css/waves.min.css');?>" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/css/bootstrap/css/bootstrap.min.css');?>">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?=Controller::asset('back/pages/waves/css/waves.min.css');?>" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" href="<?=Controller::asset('back/icon/icofont/css/icofont.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/icon/themify-icons/themify-icons.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/icon/font-awesome/css/font-awesome.min.css');?>">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/css/jquery.mCustomScrollbar.css');?>">
    <!-- am chart export.css -->
    <!-- <link rel="stylesheet" href="www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> -->
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?=Controller::asset('back/css/style.css');?>">
    <link rel="stylesheet" href="<?=Controller::asset('back/css/sweetalert2.min.css')?>">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link href="<?=Controller::asset('back/css/select2.min.css');?>" rel="stylesheet" />
</head>

<body>
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
          