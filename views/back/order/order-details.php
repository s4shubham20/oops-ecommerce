<?php
    include_once('../../layouts/header.php');
    $id = base64_decode($_GET['orderid'])/5412151;
    ?>
    <style>
        select.form-control, select.form-control:focus, select.form-control:hover {
            border: 1px solid #cccccc;
        }
        .form-control {
            width:auto;
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
                                            <h5 class="m-b-10">Order Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="javasacript:void();"><i class="fa fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void();">Order Details</a>
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
                                                        <h5>Order Details List</h5>
                                                        <a href="index.php"><button class="btn waves-effect waves-light btn-grd-primary float-right"><i class="icofont icofont-eye-alt"></i>View Order List</button></a>
                                                    </div>
                                                    <?php
                                                        $orders = $controller->selectData('orders', '*', array('id' => $id));
                                                    ?>
                                                    <div class="mx-4 my-4"><b>Address:</b> 
                                                        <?php
                                                            echo $orders[0]['address'];
                                                        ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <?php
                                                        $orderDetails = $controller->Join('order_details','order_details.id,order_details.qty AS orderqty, order_details.order_id,order_details.order_status, order_details.product_id,order_details.amount, products.name, products.image','INNER','products','product_id','id','','',array('order_details.order_id' => $id));
                                                        // echo "<pre>";
                                                        // print_r($orderDetails);
                                                        // echo "</pre>";
                                                            if(isset($orderDetails)){
                                                        ?>
                                                        <table id="myTable" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Product</th>
                                                                    <th>Image</th>
                                                                    <th>Order Status</th>
                                                                    <th>Amount</th>
                                                                    <th>Quantity</th>
                                                                    <th>Sub Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $qty =0;
                                                                    $amount= 0;
                                                                    foreach($orderDetails as $key => $item){
                                                                        $qty+= $item['orderqty'];
                                                                        $amount = $item['amount'];
                                                                ?>
                                                                <tr>
                                                                    <input type="hidden" id="orderId" value="<?=$item['id'];?>"/>
                                                                    <td><?=$key+1;?></td>
                                                                    <td><?=$item['name'];?></td>
                                                                    <td><img src="<?=Controller::asset($item['image']);?>" width="100" alt=""></td>
                                                                    <td>
                                                                        <select onchange="orderstatusId('<?=$item['id'];?>')" id="orderItemId<?=$item['id'];?>" class="form-control" style="height:auto">    
                                                                        <?php
                                                                            $orderStatus = $controller->selectData('orderstatus','*');
                                                                            if(isset($orderStatus)){
                                                                                foreach($orderStatus as $key => $list){
                                                                                    echo '<option value="'.$list['id'].'"'.(($list['id'] == $item['order_status']) ? 'selected':'').'>'.$list['name'].'</option>';
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><?=$item['amount'];?></td>
                                                                    <td><?=$item['orderqty'];?></td>
                                                                    <td><?=$amount*$item['orderqty'];?></td>
                                                                </tr>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                            }
                                                            ?>
                                                        <div>
                                                            <b>Total Quantity : <?=$qty;?></b>
                                                            <br/>
                                                            <b>Total Amount : <?=$amount*$qty;?></b>
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
    </div> 
<?php
    include('../../layouts/footer.php');
?>