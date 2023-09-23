<?php
    include_once('../../layouts/header.php');
    ?>
    <style>
        #galeria{
            display: flex;
        }
        #galeria img{
            width: 85px;
            height: 85px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            opacity: 85%;
        }
    </style>
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
                                            <h5 class="m-b-10">Product</h5>
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
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add Product</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Product</button></a>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="<?php echo Controller::base_url('admin/ProductController.php');?>" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="name">Name</label>
                                                                    <input type="text" id="name" name="name" class="form-control" <?php if(isset($_SESSION['session']['name'])){echo 'value="'.$_SESSION['session']['name'].'"';} unset($_SESSION['session']['name']);?>>
                                                                    <?php 
                                                                        if(isset($_SESSION['alreadyExist'])):
                                                                            echo '<span class="text-danger">'.$_SESSION['alreadyExist'].'</span>';
                                                                            unset($_SESSION['alreadyExist']);
                                                                        endif;
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="mb-3">
                                                                        <label  class="form-label">Category</label>
                                                                        <select class="js-example-theme-multiple2" name="categoryId" id="categoryId">
                                                                            <option>Select Category</option>
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
                                                                    <label  class="form-label">Sub Category</label>
                                                                    <select  name="subcategoryId" id="subcategoryId" class="js-example-theme-multiple2">
                                                                        <option>Select Category First</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label  class="form-label">Brand</label>
                                                                    <select  name="brandId" id="brandId" class="js-example-theme-multiple2">
                                                                        <option>Select Category First</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="price">Price</label>
                                                                    <input type="number" id="price" name="price" class="form-control" placeholder="Price" <?php if(isset($_SESSION['session']['price'])){echo 'value="'.$_SESSION['session']['price'].'"';} unset($_SESSION['session']['price']);?>>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="sellingprice">Selling Price</label>
                                                                    <input type="number" id="sellingprice" name="sellingprice" class="form-control" placeholder="Selling Price" <?php if(isset($_SESSION['session']['sellingprice'])){echo 'value="'.$_SESSION['session']['sellingprice'].'"';} unset($_SESSION['session']['sellingprice']);?>>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="qty">Quantity</label>
                                                                    <input type="number" id="qty" name="qty" class="form-control" placeholder="Quantity" <?php if(isset($_SESSION['session']['qty'])){echo 'value="'.$_SESSION['session']['qty'].'"';} unset($_SESSION['session']['qty']);?>>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="sku">SKU</label>
                                                                    <input type="number" id="sku" name="sku" class="form-control" placeholder="SKU" <?php if(isset($_SESSION['session']['sku'])){echo 'value="'.$_SESSION['session']['sku'].'"';} unset($_SESSION['session']['sku']);?>>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="size">Size</label>
                                                                    <select class="js-example-theme-multiple1" name="size[]" multiple>
                                                                        <option value="XS">XS</option>
                                                                        <option value="S">S</option>
                                                                        <option value="M">M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                        <option value="XXL">XXL</option>
                                                                        <option value="XXL">XXL</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="image">Image</label>
                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="alt">Alt</label>
                                                                    <input type="text" id="alt" name="alt" class="form-control" placeholder="Alt" <?php if(isset($_SESSION['session']['alt'])){echo 'value="'.$_SESSION['session']['alt'].'"';} unset($_SESSION['session']['alt'])?>>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="productimage">Products Images</label>
                                                                    <div id="galeria"></div>
                                                                    <input type="file" id="productimage" name="files[]" class="form-control" multiple onchange="previewMultiple(event)" id="productimage">
                                                                </div>
                                                                <div class="col-md-6 my-3 mt-5">
                                                                    <input type="radio" class="mx-2" name="status" value="1">Active
                                                                    <input type="radio" class="mx-2" name="status" value="0" checked>Inactive
                                                                </div>
                                                                <!-- <div class="col-md-6 mb-5"></div> -->
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="short_desc" class="form-label">Short Description</label>
                                                                    <textarea class="form-control" name="short_desc" id="short_desc" rows="3" placeholder="Short Description"><?php if(isset($_SESSION['session']['short_desc'])):echo $_SESSION['session']['short_desc']; unset($_SESSION['session']['short_desc']);endif;?></textarea>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="description" class="form-label">Meta Description</label>
                                                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"><?php if(isset($_SESSION['session']['description'])):echo $_SESSION['session']['description']; unset($_SESSION['session']['description']);endif;?></textarea>
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
                                                                    <textarea class="form-control" name="metadescription" id="metadescription" rows="3" placeholder="Meta Description"><?php if(isset($_SESSION['session']['metadescription'])): echo $_SESSION['session']['metadescription']; unset($_SESSION['session']['metadescription']); endif;?></textarea>
                                                                </div>
                                                                <div>
                                                                    <button name="submitBtn" class="btn waves-effect waves-light btn-success btn-outline-success ml-3"><i class="icofont icofont-check-circled"></i>Submit</button>
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
    <script>
        function previewMultiple(event){
            var saida = document.getElementById("productimage");
            var quantos = saida.files.length;
            for(i = 0; i < quantos; i++){
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("galeria").innerHTML += '<img src="'+urls+'">';
            }
        }
    </script>
<?php
    include('../../layouts/footer.php');
?>