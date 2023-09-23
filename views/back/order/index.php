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
                                            <h5 class="m-b-10">Order</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="javasacript:void();"><i class="fa fa-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void();">Order</a>
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
                                                        <h5>Order List</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <?php
                                                        $order = $controller->selectData('orders','*','','id');
                                                            if(isset($order[0])){
                                                        ?>
                                                        <table id="myTable" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Order ID</th>
                                                                    <th>Order Date</th>
                                                                    <th>Payment Type</th>
                                                                    <th>Payment Status</th>
                                                                    <th>Sub Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($order as $key => $item){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $key+1;?></td>
                                                                    <td class="text-center"><?=$item['id'];?></td>
                                                                    <td><?=$item['created_at'];?></td>
                                                                    <td><?=ucwords($item['payment_type']);?></td>
                                                                    <td><?=ucwords($item['payment_status']);?></td>
                                                                    <td>
                                                                        <?php 
                                                                            $orderAmount = $controller->selectData('order_details','*',array('order_id ' => $item['id']));
                                                                            if(isset($orderAmount)){
                                                                                $qty = 0;
                                                                                $amount = 0;
                                                                                foreach($orderAmount as $key => $list){
                                                                                    $qty +=$list['qty'];
                                                                                    $amount=$list['amount'];
                                                                                }
                                                                                echo '<b>Quantity: </b>'.$qty;
                                                                                echo "<br>";
                                                                                echo '<b>Total Amount: </b>'.$amount*$qty;
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <a></a>
                                                                        <a href="<?=Controller::ViewPath('back/order/order-details.php?orderid='.base64_encode($item['id']*5412151));?>" class="btn waves-effect waves-light btn-info btn-outline-info"><i class="icofont icofont-edit"></i></a>
                                                                        <a onclick="return DeleteConfirmation();" href="<?php echo Controller::base_url('admin/PostController.php?deletepost=delete&&id='.base64_encode($item['id']*10234560));?>"><button type="button" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-trash"></i></button></a>
                                                                    </td>
                                                                </tr>
                                                                <?php 
                                                                }?>
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