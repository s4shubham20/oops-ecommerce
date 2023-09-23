<?php
    session_start();
    include_once('../controller.php');
    $controller = new Controller();
    //select subcategory on select of category--
    if(isset($_POST['catId'])){
        $id = $_POST['catId'];
        $subcategory = $controller->selectData('subcategories', '*', array('category_id' => $id));
        if ($subcategory[0] > 0):
            foreach ($subcategory as $key => $item):?>
            <option value="<?=$item['id'];?>" <?php if(isset($_SESSION['session']['subcategory']) && $item['id'] == $_SESSION['session']['subcategory']){echo  'selected';unset($_SESSION['session']['subcategory']);} ?>><?=ucwords($item['name']);?></option>
            <?php endforeach;
        else:
            echo '<option>Select Category First</option>';    
        endif;
    }

    //select brands on based of category
    if(isset($_POST['_catId'])):
        $id = $_POST['_catId'];
        $brand = $controller->selectData('brands', '*', array('category_id' => $id));
        if ($brand[0] > 0):
            foreach ($brand as $key => $item):?>
            <option value="<?=$item['id'];?>" <?php if(isset($_SESSION['session']['brandId']) && $item['id'] == $_SESSION['session']['brandId']){echo  'selected';unset($_SESSION['session']['brandId']);} ?>><?=ucwords($item['name']);?></option>
            <?php endforeach;
        else:
            echo '<option>Select Category First</option>';
        endif;
    endif;

//selection product subcategory
    if(isset($_POST['productId'])):
        $catId = $_POST['productcatId'];
        $subCatId = base64_decode($_POST['productSubCatId'])/23540545;
        $productId = base64_decode($_POST['productId'])/2354125;
        $subCategory = $controller->selectData('subcategories', '*', array('category_id' => $catId));
        if($subCategory != null):
            foreach ($subCategory as $key => $value) {
                echo '<option value="'.$value['id'].'" '.(($value['id'] == $subCatId)  ?'selected="selected"':"").'>'.$value['name'].'</option>';
            }
        else:
            echo '<option>Select Category First</option';
        endif;
    endif;

//selection of product brand
    if(isset($_POST['productBrandId'])):
        $catId = $_POST['productcatId'];
        echo $brandId = base64_decode($_POST['productBrandId'])/2354125;
        $brand = $controller->selectData('brands', '*', array('category_id' => $catId));
        if($brand):
            foreach ($brand as $key => $value) {
                echo '<option value="'.$value['id'].'" '.(($value['id'] == $brandId)  ?'selected="selected"':"").'>'.$value['name'].'</option>';
            }
        else:
            echo '<option>Select Category First</option';
        endif;
    endif;
//selection of product brand end
    if(isset($_POST['orderStatusId'])){
        $orderItemId = $_POST['orderItemId'];
        $orderstatusId = $_POST['orderStatusId'];
        $controller->UpdateData('order_details', array('order_status ' => $orderstatusId), 'id', $orderItemId);
    }

// products sorting on selected subcategories
if(isset($_POST['sortValue']) && !empty($_POST['sortValue'])){
    $subCatId = base64_decode($_POST['subCategoryId'])/1325412;
        if($_POST['sortValue'] == 1){
            $sortProduct = $controller->selectData('products', '*', array('subcategory_id' => $subCatId),'id');
        }elseif($_POST['sortValue'] == 2){
            $sortProduct = $controller->selectData('products', '*', array('subcategory_id' => $subCatId),'id');
        }elseif($_POST['sortValue'] == 3){
            $sortProduct = $controller->selectData('products', '*', array('subcategory_id' => $subCatId),'id');
        }elseif($_POST['sortValue'] == 4){
            $sortProduct = $controller->selectData('products', '*', array('subcategory_id' => $subCatId),'sellingprice');
        }elseif($_POST['sortValue'] == 5){
            $sortProduct = $controller->selectData('products', '*', array('subcategory_id' => $subCatId),'sellingprice','ASC');
        }
    ?>
    <?php
        if(isset($sortProduct[0])){
            foreach($sortProduct as $key => $item){
    ?>
    <div class="single-product">
        <div class="product-image pos-rel">
            <a href="shop-details.html" class=""><img src="<?=Controller::asset($item['image']);?>" alt="img"></a>
            <div class="product-action">
                <a href="#" class="quick-view-btn"><i class="fal fa-eye"></i></a>
                <a href="#" class="wishlist-btn"><i class="fal fa-heart"></i></a>
                <a href="#" class="compare-btn"><i class="fal fa-exchange"></i></a>
            </div>
            <div class="product-action-bottom">
                <a href="cart.html" class="add-cart-btn"><i class="fal fa-shopping-bag"></i>Add to
                Cart</a>
            </div>
            <div class="product-sticker-wrapper">
                <span class="product-sticker new">New</span>
            </div>
        </div>
        <div class="product-desc">
            <div class="product-name"><a href="shop-details.html"><?=$item['name'];?></a></div>
            <div class="product-price">
                <span class="price-now"><?=$item['sellingprice'];?></span>
                <span class="price-old"><?=$item['price'];?></span>
            </div>
            </div>
            <ul>
                <li class="buttons">
                    <?php
                        $json = json_decode($item['size'], true);
                        foreach ($json as $key => $value) {
                    ?>
                        <input type="radio" name="size" label="<?=$value;?>"  id="productSize" value="<?=$value;?>"/>
                    <?php }?>
                </li>
            </ul>
        </div>
    </div>
    <?php }
        }
    }
    ?>