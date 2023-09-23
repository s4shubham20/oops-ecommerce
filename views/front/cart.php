
<?php
   include_once('../../app/controller.php');
   $controller = new Controller;
   if(!isset($_SESSION)) 
    { 
        session_start(); 
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0):
            header('location:index.php');
            exit(0);
        endif;
    } 
?>
<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Ecomart - Fashion eCommerce HTML Template</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
   <!-- CSS here -->
   <link rel="stylesheet" href="<?=Controller::asset('front/css/preloader.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/bootstrap.min.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/meanmenu.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/animate.min.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/owl.carousel.min.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/swiper-bundle.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/backToTop.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/magnific-popup.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/ui-range-slider.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/nice-select.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/fontAwesome5Pro.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/flaticon.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/default.css');?>">
   <link rel="stylesheet" href="<?=Controller::asset('front/css/style.css');?>">
   <style>
      .table-responsive {overflow-x: initial !important;}
      td div.nice-select{
         /* position: absolute; */
         border: solid 1px;
         padding-left: 8px;
         padding-right: 21px;
      }

   </style>
</head>
<body>
<?php
    require_once dirname( __FILE__ ) . '/header.php';
?>
<section class="page-title-area" data-background="<?=Controller::asset('front/img/bg/page-title-bg.jpg');?>">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="page-title-wrapper text-center">
               <h1 class="page-title">My Cart</h1>
               <div class="breadcrumb-menu">
                  <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                     <ul class="trail-items">
                        <li class="trail-item trail-begin"><a href="index.php"><span>Home</span></a></li>
                        <li class="trail-item trail-end"><span>Cart</span></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- page title area end  -->

<!-- cart area start  -->
<section class="cart-area">
   <div class="container container-small">
      <div class="row">
         <div class="col-12">
            <div class="table-content table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th class="product-thumbnail">Images</th>
                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-name">Size</th>
                        <th class="product-price">Unit Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Remove</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php 
                  //   print_r($_SESSION['cart']);
                        if(isset($_SESSION['cart'])):
                           $total_quantity = 0;
                           $total_price = 0;
                           foreach($_SESSION['cart'] as $key => $item){
                              $product = $controller->selectData('products', '*', array('id' => $key));
                              $price = $product[0]['sellingprice'];
                              $qty = $item['qty'];
                              $size = $item['size'];
                    ?>
                    <tr>
                        <td class="product-thumbnail"><a href="shop-details.php?productid=<?=base64_encode($key*356484541);?>"><img
                                 src="<?=Controller::asset($product[0]['image']);?>" alt="<?=$product[0]['alt']?>"></a></td>
                        <td class="product-name"><a href="shop-details.php?productid=<?=base64_encode($key*356484541);?>"><?=$product[0]['name'];?></a></td>
                        <td>
                           <select onchange="productSize('<?=$key;?>')" id="size<?=$key;?>">
                           <?php 
                              $psize = json_decode($product[0]['size'] ,true);
                              foreach($psize as  $list){?>
                                 <option value="<?=$list;?>" <?php if($list == $size):echo "selected"; endif;?>><?=$list?></option>
                           <?php }?>
                           </select>
                        </td>
                        <td class="product-price"><span class="amount" id="p_amount<?=$key;?>"><?=$price;?></span></td>
                        <td class="product-quantity text-center">
                           <div class="product-quantity mt-10 mb-10">
                              <div class="product-quantity-form">
                                 <form action="#">
                                    <button class="cart-minus" id="minus<?=$key;?>"  onclick="priceUpdateFunc(<?=$key;?>, '0')" value="0" <?php echo ($qty=='1')?" disabled":"" ?>><i class="far fa-minus" ></i></button>
                                    <input class="cart-input quantityinput" id="qty<?=$key;?>" type="number" max="5" min="1" value="<?=$qty;?>" readonly>
                                    <button class="cart-plus" id="plus<?=$key;?>" onclick="priceUpdateFunc(<?=$key;?>, '1')" value="1"  <?php echo ($qty=='5')?" disabled":"" ?> ><i class="far fa-plus"></i></button>
                                 </form>
                              </div>
                           </div>
                        </td>
                        <td class="product-subtotal"><span class="amount" id="update_amount<?=$key;?>"><?=$price*$qty;?></span></td>
                        <td class="product-remove"><a class="remove-item" href="javascript:void();" onclick="add_to_cart('<?=$key;?>', 'remove')"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php 
                     $total_quantity += $qty;
                     $total_price += ($price*$qty);
                        }
                        endif;
                    ?>
                    </tbody>
               </table>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="coupon-all">
                     <div class="coupon d-flex align-items-center">
                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                           placeholder="Coupon code" type="text">
                        <button class="fill-btn" name="apply_coupon" type="submit">Apply
                           coupon</button>
                     </div>
                     <div class="coupon2">
                        <button onclick="window.location.reload()" class="fill-btn" name="update_cart"
                           type="submit">Update cart</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-5 ml-auto">
                  <div class="cart-page-total">
                     <?php if(isset($_SESSION['cart'])):?>
                     <h2>Cart totals</h2>
                     <ul class="mb-20">
                        <li>Total Quantity: <span><b id="totalQuantity"><?=$total_quantity;?></b></span></li>
                        <li>Total Amount: <span><b id="totalAmount"><?=$total_price;?></b></span></li>
                     </ul>
                     <a class="border-btn" href="checkout.php">Proceed to checkout</a>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- cart area end  -->
</main>
<?php
    require_once dirname( __FILE__ ) . '/footer.php';
?>
<!-- JS here -->
<script src="<?=Controller::asset('front/js/vendor/jquery-3.6.0.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/vendor/waypoints.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/meanmenu.js');?>"></script>
<script src="<?=Controller::asset('front/js/swiper-bundle.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/owl.carousel.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/magnific-popup.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/parallax.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/backToTop.js');?>"></script>
<script src="<?=Controller::asset('front/js/jquery-ui-slider-range.js');?>"></script>
<script src="<?=Controller::asset('front/js/nice-select.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/counterup.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/ajax-form.js');?>"></script>
<script src="<?=Controller::asset('front/js/wow.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/isotope.pkgd.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/imagesloaded.pkgd.min.js');?>"></script>
<script src="<?=Controller::asset('front/js/main.js');?>"></script>
<script>
function add_to_cart(pid, type){
      $.ajax({
         url:"<?=Controller::base_url('admin/ManageCartController.php');?>",
         type:'post',
         data:{_pid:pid,_type:type},
         success:function(response){
            if(type == 'remove'){
               window.location.reload();
            }
            $("#cartcount").html(response);
            //console.log(response);
         }
      });
  }

  const productSize = (productId) =>{
         let doc = document.getElementById("size"+productId);
         let productSize = doc.value;
         console.log('test' + productSize);
         $.ajax({
            url:"<?=Controller::base_url('admin/ManageCartController.php');?>",
            type:'post',
            data:{productId:productId,productSize:productSize},
            success:function(res){
               // console.log(res);
            }
         });
   };

const priceUpdateFunc = (proid, value) =>{
    let qty = document.getElementById("qty"+proid);
    let minus = document.getElementById("minus"+proid);
    let plus = document.getElementById("plus"+proid);
    let single_amount = document.getElementById("p_amount"+proid)
    let u_amount = document.getElementById("update_amount"+proid)
    let newValue 
    let totalAmount =document.getElementById("totalAmount");
    let totalQuantity =document.getElementById("totalQuantity");
      // console.log(totalAmount.innerHTML);
    if(value == 0){
        plus.removeAttribute("disabled")
        newValue = parseInt(qty.value) - 1;
        let updated_amount = newValue * (single_amount.innerHTML);
        u_amount.innerHTML = updated_amount
        let totalQty = parseInt(totalQuantity.innerHTML)- 1;
        totalQuantity.innerHTML = totalQty;
        let totalAmt = parseInt(totalAmount.innerHTML) - parseInt(single_amount.innerHTML);
        totalAmount.innerHTML = totalAmt;
        if(newValue == 1){
            minus.setAttribute("disabled","true")
        }
    } else {
        minus.removeAttribute("disabled")
        qty.removeAttribute("disabled")
        newValue = parseInt(qty.value) + 1;
        let updated_amount = newValue * (single_amount.innerHTML);
        u_amount.innerHTML = updated_amount
        let totalQty = parseInt(totalQuantity.innerHTML)+ 1;
        totalQuantity.innerHTML = totalQty;
        let totalAmt = parseInt(totalAmount.innerHTML) + parseInt(single_amount.innerHTML);
        totalAmount.innerHTML = totalAmt;

        if(newValue == 5){
            plus.setAttribute("disabled","true")
        }
        
    }
   //  console.log(u_amount.innerHTML);
    let pqty = newValue;
   //  console.log(pqty)
    $.ajax({
        url:"<?=Controller::base_url('admin/ManageCartController.php');?>",
        type:'post',
        data:{updatepqty:pqty,updatepid:proid},
        success:function(res){
            //console.log(res);
        }
    });
   
}

</script>
</body>


</html>