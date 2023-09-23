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
                                            <h5 class="m-b-10">Product</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="javasacript:void();"><i class="fa fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void();">Product</a>
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
                                                        <h5>Product List</h5>
                                                        <a href="create.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-plus"></i>Add Product</button></a>
                                                    </div>
                                                    <div class="card-block">
                                                        <?php
                                                        $product = $controller->selectData('products','*','','id');
                                                            if(isset($product[0])){
                                                        ?>
                                                        <table id="myTable" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Categories</th>
                                                                    <th>Status</th>
                                                                    <th>Image</th>
                                                                    <th>Create Date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($product as $key => $item){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $key+1;?></td>
                                                                    <td>
                                                                        <b>Name: </b><?php echo $item['name'];?>
                                                                        <br>
                                                                        <b>Slug: </b><?php echo $item['slug'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                            $condition = array('id' => $item['category_id']);
                                                                            $categoryName = $controller->selectData('category', '*', $condition);
                                                                            foreach($categoryName as $key => $list){
                                                                                echo '<b>Category: </b>'.$list['name'];
                                                                            }
                                                                            echo '<br>';
                                                                            $condition = array('id' => $item['subcategory_id']);
                                                                            $subcategory = $controller->selectData('subcategories', '*', $condition);
                                                                            foreach($subcategory as $list){
                                                                                echo '<b>Sub Category: </b>'. $list['name'].' ';
                                                                            }
                                                                            echo '<br>';
                                                                            $condition = array('id' => $item['brand_id']);
                                                                            $brand = $controller->selectData('brands', '*', $condition);
                                                                            foreach($brand as $list){
                                                                                echo '<b>Brand: </b>'. $list['name'].' ';
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                            if($item['status'] == 1){
                                                                                echo '<span class="label label-success">Active</span>';
                                                                            }else{
                                                                                echo '<span class="label label-danger">Inactive</span>';
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <img src="<?php echo Controller::asset($item['image']);?>" alt="<?php echo $item['alt'];?>" width="100">
                                                                    </td>
                                                                    <td><?php echo $item['created_at'];?></td>
                                                                    <td>
                                                                        <a></a>
                                                                        <a href="edit.php?id=<?=base64_encode($item['id']*10352560);?>"><button class="btn waves-effect waves-light btn-info btn-outline-info"><i class="icofont icofont-edit"></i></button></a>
                                                                        <a onclick="return DeleteConfirmation();" href="<?php echo Controller::base_url('admin/ProductController.php?deleteproduct=delete&&id='.base64_encode($item['id']*10352560));?>"><button type="button" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-trash"></i></button></a>
                                                                    </td>
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                            }
                                                        ?>
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