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
                                                <a href="#"><i class="fa fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void();">Post</a>
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
                                                        <h5>Add Post</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Post</button></a>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="<?php echo Controller::base_url('admin/PostController.php');?>" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="name">Title</label>
                                                                    <input type="text" id="name" name="name" class="form-control" <?php if(isset($_SESSION['session']['title'])){echo 'value="'.$_SESSION['session']['title'].'"';} unset($_SESSION['session']['title']);?>>
                                                                    <?php 
                                                                        if(isset($_SESSION['title'])):
                                                                            echo '<span class="text-danger">'.$_SESSION['title'].'</span>';
                                                                            unset($_SESSION['title']);
                                                                        endif;
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="mb-3">
                                                                        <label for="category" class="form-label">Category</label>
                                                                        <select class="js-example-theme-multiple2" name="category" id="category">
                                                                            <?php
                                                                            $category = $controller->selectData('category');
                                                                            if ($category[0] > 0):
                                                                                foreach ($category as $key => $item):?>
                                                                                <option value="<?=$item['id'];?>" <?php if(isset($_SESSION['session']['category']) && $item['id'] == $_SESSION['session']['category']){echo  'selected';unset($_SESSION['session']['category']);} ?>><?=$item['name'];?></option>
                                                                                <?php endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="image">Image</label>
                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="alt">Alt</label>
                                                                    <input type="text" id="alt" name="alt" class="form-control" placeholder="Alt" <?php if(isset($_SESSION['session']['alt'])){echo 'value="'.$_SESSION['session']['alt'].'"';} unset($_SESSION['session']['alt'])?>>
                                                                </div>
                                                                <div class="col-md-6 my-3">
                                                                    <input type="radio" class="mx-2" name="status" value="1">Active
                                                                    <input type="radio" class="mx-2" name="status" value="0" checked>Inactive
                                                                </div>
                                                                <div class="col-md-6 mb-5"></div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metatitle">Meta Title</label>
                                                                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Meta Title" <?php if(isset($_SESSION['session']['metatitle'])){echo 'value="'.$_SESSION['session']['metatitle'].'"';} unset($_SESSION['session']['metatitle'])?>>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metakeyword">Meta Keyword</label>
                                                                    <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Meta Keyword" <?php if(isset($_SESSION['session']['metakeyword'])){echo 'value="'.$_SESSION['session']['metakeyword'].'"';} unset($_SESSION['session']['metakeyword'])?>>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="metadescription" class="form-label">Meta Description</label>
                                                                    <textarea class="form-control" name="metadescription" id="metadescription" rows="3" placeholder="Meta Description"></textarea>
                                                                </div>
                                                                <div>
                                                                    <button name="submit" class="btn waves-effect waves-light btn-success btn-outline-success ml-3"><i class="icofont icofont-check-circled"></i>Submit</button>
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