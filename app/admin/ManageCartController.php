<?php 
include_once('../admin/CartController.php');
    $cart = new Cart;
    if(isset($_POST['_type'])):
        $pid = $_POST['_pid'];
        $qty = $_POST['_qty'];
        $size = $_POST['_sizeChart'];
        $type = $_POST['_type'];
        if($type == 'add'):
            $cart->addtocart($pid,$qty,$size);
        endif;
        if($type == 'remove'):
            $cart->removecart($pid);
        endif;
        echo $cart->totalProduct();
    endif;

    if(isset($_GET['itemid']) && $_GET['itemid'] != null):
        $id = base64_decode($_GET['itemid'])/41264872834762384;
        $cart->removecart($id);
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    endif;

    if(isset($_GET['emptycart']) && $_GET['emptycart'] = 'removeall'):
        $cart->emptycart();
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    endif;
    if(isset($_POST['updatepqty']) && !empty($_POST['updatepid'])){
        $id = $_POST['updatepid'];
        $qty = $_POST['updatepqty'];
        $cart->updatecart($id, $qty);
    }

    if(isset($_POST['productId']) && !empty($_POST['productId'])):
        $id = $_POST['productId'];
        $size = $_POST['productSize'];
        $cart->updatecartsize($id, $size);
    endif;
?>