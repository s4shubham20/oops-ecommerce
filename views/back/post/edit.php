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
                                                <?php
                                                    $id = base64_decode($_GET['id'])/10234560;
                                                    $condition = array('id' => $id);
                                                    $post = $controller->selectData('blogs','*',$condition);
                                                ?>
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add Post</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Post</button></a>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="<?php echo Controller::base_url('admin/PostController.php');?>" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <input type="hidden" name="postId" value="<?php echo $post[0]['id'] ;?>">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="name">Title</label>
                                                                    <input type="text" id="name" name="name" class="form-control" value="<?php if(isset($_SESSION['session']['title'])){echo $_SESSION['session']['title'];}else{echo $post[0]['title'];} unset($_SESSION['session']['title']);?>">
                                                                    <?php 
                                                                        if(isset($_SESSION['alreadyExist'])):
                                                                            echo '<span class="text-danger">'.$_SESSION['alreadyExist'].'</span>';
                                                                            unset($_SESSION['alreadyExist']);
                                                                        endif;
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="slug">Slug</label>
                                                                    <input type="text" class="form-control" value="<?php echo $post[0]['slug'];?>" readonly>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="mb-3">
                                                                        <label for="category" class="form-label">Category</label>
                                                                        <select class="form-control" name="category" id="category">
                                                                            <?php
                                                                            $category = $controller->selectData('category');
                                                                            if ($category[0] > 0):
                                                                                foreach ($category as $key => $item):?>
                                                                                <option value="<?=$item['id'];?>" <?php if(isset($_SESSION['session']['category']) && $item['id'] == $_SESSION['session']['category']){echo  'selected';unset($_SESSION['session']['category']);}elseif($item['id']==$post[0]['category_id']){echo 'selected';} ?>><?=$item['name'];?></option>
                                                                                <?php endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="image">Image</label>
                                                                    <img src="<?php echo Controller::asset($post[0]['image']);?>" alt="<?php $post[0]['alt'];?>" width="100">
                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="alt">Alt</label>
                                                                    <input type="text" id="alt" name="alt" class="form-control" placeholder="Alt" value="<?php if(isset($_SESSION['session']['alt'])){echo $_SESSION['session']['alt'];unset($_SESSION['session']['alt']);}else{echo $post[0]['alt'];}?>">
                                                                </div>
                                                                <div class="col-md-6 my-3">
                                                                    <input type="radio" class="mx-2" name="status" value="1" <?php if (isset($_SESSION['session']['status']) && $_SESSION['session']['status'] == 1 ) : echo 'checked';unset($_SESSION['session']['status']);elseif($post[0]['status'] == 1): echo 'checked'; endif;?>>Active
                                                                    <input type="radio" class="mx-2" name="status" value="0" <?php if(isset($_SESSION['session']['status']) && $_SESSION['session']['status'] == 0 ){echo 'checked';unset($_SESSION['session']['status']);}elseif($post[0]['status'] == 0){ echo 'checked';}?>>Inactive
                                                                </div>
                                                                <div class="col-md-6 mb-5"></div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"><?php echo $post[0]['description'];?></textarea>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metatitle">Meta Title</label>
                                                                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Meta Title" value="<?php if(isset($_SESSION['session']['metatitle'])){echo $_SESSION['session']['metatitle'];unset($_SESSION['session']['metatitle']);}else{echo $post[0]['metatitle'];}?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metakeyword">Meta Keyword</label>
                                                                    <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Meta Keyword" value="<?php if(isset($_SESSION['session']['metakeyword'])){echo $_SESSION['session']['metakeyword']; unset($_SESSION['session']['metakeyword']);}else{echo $post[0]['metakeyword'];}?>">
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="metadescription" class="form-label">Meta Description</label>
                                                                    <textarea class="form-control" name="metadescription" id="metadescription" rows="3" placeholder="Meta Description"><?=$post[0]['metadescription'];?></textarea>
                                                                </div>
                                                                <div>
                                                                    <button name="updateBtn" class="btn waves-effect waves-light btn-success btn-outline-success ml-3"><i class="icofont icofont-check-circled"></i>Submit</button>
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