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
                                            <h5 class="m-b-10">Brand</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"><i class="fa fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void();">Brand</a>
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
                                                    $id = base64_decode($_GET['id'])/1035560;
                                                    $condition = array('id' => $id);
                                                    $brand = $controller->selectData('brands','*',$condition);
                                                ?>
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Brand</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Post</button></a>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="<?php echo Controller::base_url('admin/BrandController.php');?>" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <input type="hidden" name="brandId" id="brandId" value="<?php echo $brand[0]['id'] ;?>">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="name">Name</label>
                                                                    <input type="text" id="name" name="name" class="form-control" value="<?php if(isset($_SESSION['session']['name'])){echo $_SESSION['session']['name'];}else{echo $brand[0]['name'];} unset($_SESSION['session']['name']);?>">
                                                                    <?php 
                                                                        if(isset($_SESSION['alreadyExist'])):
                                                                            echo '<span class="text-danger">'.$_SESSION['alreadyExist'].'</span>';
                                                                            unset($_SESSION['alreadyExist']);
                                                                        endif;
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="slug">Slug</label>
                                                                    <input type="text" class="form-control" value="<?php echo $brand[0]['slug'];?>" readonly>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="mb-3">
                                                                        <label for="categoryId" class="form-label">Category</label>
                                                                        <select class="js-example-theme-multiple2" name="categoryId" id="selectedcategoryId">
                                                                            <?php
                                                                                $category = $controller->selectData('category');
                                                                                if ($category[0] > 0):
                                                                                    foreach ($category as $key => $item):?>
                                                                                    <option value="<?=$item['id'];?>" <?php if(isset($_SESSION['session']['category']) && $item['id'] == $_SESSION['session']['category']){echo  'selected';unset($_SESSION['session']['category']);}elseif($item['id']==$brand[0]['category_id']){echo 'selected';} ?>><?=$item['name'];?></option>
                                                                                    <?php endforeach;
                                                                                endif;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label  class="form-label">Sub Category</label>
                                                                    <select name="subcategoryId[]" id="selectedsubcategoryId" class="js-example-theme-multiple1"  multiple="multiple">
                                                                    <?php
                                                                        $ids = json_decode($brand[0]['subcategory_id'], true);
                                                                        $subcategory = $controller->selectData('subcategories', '*');
                                                                        foreach($subcategory as $key => $list):
                                                                        ?>
                                                                        <?php 
                                                                            if($ids != null):
                                                                                $isArray = in_array($list['id'],$ids);
                                                                            else:
                                                                                $isArray = '';
                                                                            endif;
                                                                             ?>
                                                                            <option value="<?=$list['id'];?>" <?php if($isArray){echo 'selected';}?>><?=$list['name'];?></option>
                                                                        <?php endforeach
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="image">Image</label>
                                                                    <img src="<?php echo Controller::asset($brand[0]['image']);?>" alt="<?php $brand[0]['alt'];?>" width="100">
                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="alt">Alt</label>
                                                                    <input type="text" id="alt" name="alt" class="form-control" placeholder="Alt" value="<?php if(isset($_SESSION['session']['alt'])){echo $_SESSION['session']['alt'];unset($_SESSION['session']['alt']);}else{echo $brand[0]['alt'];}?>">
                                                                </div>
                                                                <div class="col-md-6 my-3">
                                                                    <input type="radio" class="mx-2" name="status" value="1" <?php if($brand[0]['status'] == 1): echo "checked"; endif;?>>Active
                                                                    <input type="radio" class="mx-2" name="status" value="0" <?php if($brand[0]['status'] == 0): echo "checked"; endif;?>>Inactive
                                                                </div>
                                                                <div class="col-md-6 mb-3"></div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metatitle">Meta Title</label>
                                                                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Meta Title" value="<?php if(isset($_SESSION['session']['metatitle'])){echo $_SESSION['session']['metatitle'];unset($_SESSION['session']['metatitle']);}else{echo $brand[0]['metatitle'];}?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metakeyword">Meta Keyword</label>
                                                                    <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Meta Keyword" value="<?php if(isset($_SESSION['session']['metakeyword'])){echo $_SESSION['session']['metakeyword']; unset($_SESSION['session']['metakeyword']);}else{echo $brand[0]['metakeyword'];}?>">
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="metadescription" class="form-label">Meta Description</label>
                                                                    <textarea class="form-control" name="metadescription" id="metadescription" rows="3" placeholder="Meta Description"><?=$brand[0]['metadescription'];?></textarea>
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