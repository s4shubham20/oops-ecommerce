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
                                                <?php
                                                    $id = base64_decode($_GET['id'])/10352560;
                                                    $condition = array('id' => $id);
                                                    $product = $controller->selectData('products','*',$condition);
                                                ?>
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Product</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Product</button></a>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" action="<?php echo Controller::base_url('admin/ProductController.php');?>" enctype="multipart/form-data">
                                                            <input type="hidden" name="productId" id="productId" value="<?=base64_encode($product[0]['id']*2354125);?>">
                                                            <div class="form-group row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="name">Name</label>
                                                                    <input type="text" id="name" name="name" class="form-control" value="<?=$product[0]['name'];?>">
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
                                                                        <select class="js-example-theme-multiple2" name="categoryId" id="productcategoryId">
                                                                            <option>Select Category</option>
                                                                            <?php
                                                                            $category = $controller->selectData('category');
                                                                            if ($category[0] > 0):
                                                                                foreach ($category as $key => $item):?>
                                                                                <option value="<?=$item['id'];?>" <?php if($product[0]['category_id'] == $item['id']){echo 'selected';} ?>><?=$item['name'];?></option>
                                                                                <?php endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label  class="form-label">Sub Category</label>
                                                                    <input type="hidden" id="productSubCatId" value="<?=base64_encode($product[0]['subcategory_id']*23540545);?>">
                                                                    <select  name="subcategoryId" id="productsubcategoryId" class="js-example-theme-multiple2">
                                                                        <?php 
                                                                             $subcategory = $controller->selectData('subcategories', '*');
                                                                             foreach ($subcategory as $key => $item) {
                                                                                 echo '<option value="'.$item['id'].'" '.(($item['id'] == $product[0]['subcategory_id']) ? "selected" : "" ).'>'.$item['name'].'</option>';
                                                                             }
                                                                         ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label  class="form-label">Brand</label>
                                                                    <input type="hidden" id="productBrndId" value="<?=base64_encode($product[0]['brand_id']*2354125);?>">
                                                                    <select  name="brandId" id="productBrandId" class="js-example-theme-multiple2">
                                                                        <?php 
                                                                            $brand = $controller->selectData('brands', '*');
                                                                            foreach ($brand as $key => $item) {
                                                                                echo '<option value="'.$item['id'].'" '.(($item['id'] == $product[0]['brand_id']) ? "selected" : "" ).'>'.$item['name'].'</option>';
                                                                             }
                                                                         ?>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="price">Price</label>
                                                                    <input type="number" id="price" name="price" class="form-control" placeholder="Price" value="<?=$product[0]['price'];?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="sellingprice">Selling Price</label>
                                                                    <input type="number" id="sellingprice" name="sellingprice" class="form-control" placeholder="Selling Price" value="<?=$product[0]['sellingprice'];?>">
                                                                </div>
                                                                
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="qty">Quantity</label>
                                                                    <input type="number" id="qty" name="qty" class="form-control" placeholder="Quantity" value="<?=$product[0]['qty'];?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="sku">SKU</label>
                                                                    <input type="number" id="sku" name="sku" class="form-control" placeholder="SKU" value="<?=$product[0]['sku'];?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="size">Size</label>
                                                                        <?php 
                                                                            $productsize = json_decode($product[0]['size'], true);
                                                                        ?>
                                                                    <select class="js-example-theme-multiple1" name="size[]" multiple>
                                                                        <option value="XS" <?php if(in_array("XS",$productsize)){echo "selected";} ?>>XS</option>
                                                                        <option value="S" <?php if(in_array("S",$productsize)){echo "selected";} ?>>S</option>
                                                                        <option value="M"  <?php if(in_array("M",$productsize)){echo "selected";} ?>>M</option>
                                                                        <option value="L" <?php if(in_array("L",$productsize)){echo "selected";} ?>>L</option>
                                                                        <option value="XL" <?php if(in_array("XL",$productsize)){echo "selected";} ?>>XL</option>
                                                                        <option value="XXL" <?php if(in_array("XXL",$productsize)){echo "selected";} ?>>XXL</option>
                                                                        <option value="XXXL" <?php if(in_array("XXXL",$productsize)){echo "selected";} ?>>XXXL</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="image">Image</label>
                                                                    <img src="<?=Controller::asset($product[0]['image']);?>" width="100">
                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="alt">Alt</label>
                                                                    <input type="text" id="alt" name="alt" class="form-control" placeholder="Alt" value="<?=$product[0]['alt'];?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="col-form-label" for="productimage">Products Images</label>
                                                                    <div id="galeria"></div>
                                                                        
                                                                    <?php 
                                                                        $productImage = $controller->selectData('productimages','*', array('product_id' => $product[0]['id']));
                                                                        foreach($productImage as $key => $item){
                                                                            echo '<img src="'.Controller::asset($item['image']).'" width="100" name="productImage[]" class="img-fluid ml-2"><a class="remove-image" href="#" style="display: inline;">&#215;</a>';

                                                                        }
                                                                     ?>
                                                                    <input type="file" id="productimage" name="files[]" class="form-control" multiple onchange="previewMultiple(event)" id="productimage">
                                                                </div>
                                                                <div class="col-md-6 my-3 mt-5">
                                                                    <input type="radio" class="mx-2" name="status" value="1" <?php if($product[0]['status'] == 1): echo "checked"; endif; ?>>Active
                                                                    <input type="radio" class="mx-2" name="status" value="0"  <?php if($product[0]['status'] == 0): echo "checked"; endif; ?>>Inactive
                                                                </div>
                                                                <!-- <div class="col-md-6 mb-5"></div> -->
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="short_desc" class="form-label">Short Description</label>
                                                                    <textarea class="form-control" name="short_desc" id="short_desc" rows="3" placeholder="Short Description"><?=$product[0]['short_desc'];?></textarea>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="description" class="form-label">Meta Description</label>
                                                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"><?=$product[0]['description'];?></textarea>
                                                                </div>       
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metatitle">Meta Title</label>
                                                                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Meta Title" value="<?=$product[0]['metatitle'];?>">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="metakeyword">Meta Keyword</label>
                                                                    <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="Meta Keyword" value="<?=$product[0]['metakeyword'];?>">
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="metadescription" class="form-label">Meta Description</label>
                                                                    <textarea class="form-control" name="metadescription" id="metadescription" rows="3" placeholder="Meta Description"><?=$product[0]['metadescription'];?></textarea>
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