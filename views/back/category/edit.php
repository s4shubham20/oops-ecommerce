<?php
    include_once('../../layouts/header.php');
    ?>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <?php include('../../layouts/navbar.php');?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include('../../layouts/sidebar.php');?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Category</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="fa fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void();">Category</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add Category</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Category</button></a>
                                                    </div>
                                                    <?php 
                                                    $id = base64_decode($_GET['id'])/1023456;
                                                    if(isset($id)){
                                                        $array = array('id' => $id);
                                                        $category = $controller->selectData('category','*',$array);
                                                    }
                                                    //echo $category[0]['slug'];
                                                    
                                                    ?>
                                                    <div class="card-block">
                                                        <form method="post" action="<?php echo Controller::base_url('admin/CategoryController.php');?>" enctype="multipart/form-data">
                                                            <input type="hidden" name="category_id" value="<?php echo $category[0]['id'];?>">
                                                            <div class="form-group row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="name">Category Name</label>
                                                                    <input type="text" id="name" name="name" class="form-control <?php if(isset($_SESSION['alreadyExist'])){echo 'is-invalid'; }?>" value="<?=$category[0]['name'];?>">
                                                                    <span class="text-danger"><?php if(isset($_SESSION['alreadyExist'])){echo $_SESSION['alreadyExist']; } unset($_SESSION['alreadyExist']);?></span>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="slug">Slug</label>
                                                                    <input type="text" id="slug" class="form-control" value="<?=$category[0]['slug'];?>" readonly>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="image">Image</label>
                                                                    <img src="<?=Controller::asset($category[0]['image']);?>" class="img-fluid rounded-top" width="100" alt="<?=$category[0]['alt'];?>">
                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="alt">Alt</label>
                                                                    <input type="text" id="alt" name="alt" class="form-control" placeholder="Alt"value="<?=$category[0]['alt'];?>">
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <input type="radio" class="mx-2" name="status" value="1" <?php if($category[0]['status']==1){echo 'checked';}?>>Active
                                                                    <input type="radio" class="mx-2" name="status" value="0" <?php if($category[0]['status']==0){echo 'checked';}?>>Inactive
                                                                </div>
                                                                <div class="col-md-6 mb-5"></div>
                                                                <div>
                                                                    <button name="updateBtn" type="submit" class="btn waves-effect waves-light btn-success btn-outline-success ml-3"><i class="icofont icofont-check-circled"></i>Submit</button>
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
                    </div>
                </div>
            </div>
        </div>        
    </div>     
<?php
    include('../../layouts/footer.php');
?>