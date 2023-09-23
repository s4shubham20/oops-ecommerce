<?php
    session_start();
    include_once('../controller.php');
    $controller = new Controller();
    $products = array (
        'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
        'category_id' => 'INT NOT NULL',
        'subcategory_id' => 'INT NOT NULL',
        'brand_id' => 'INT NOT NULL',
        'name' => 'VARCHAR(255) NOT NULL',
        'slug' => 'VARCHAR(255) NOT NULL',
        'price' => 'FLOAT (10, 2)',
        'sellingprice' => 'FLOAT (10, 2)',
        'qty' => 'INT NOT NULL',
        'sku' => 'INT NULL',
        'image' =>  'VARCHAR(255) NULL',
        'alt' => 'VARCHAR(255) NOT NULL',
        'size' => 'VARCHAR(255) NOT NULL',
        'short_desc' => 'TEXT NOT NULL',
        'description' => 'TEXT NOT NULL',
        'metatitle' => 'VARCHAR(600) NOT NULL',
        'metakeyword' => 'VARCHAR(600) NOT NULL',
        'metadescription' => 'VARCHAR(600) NOT NULL',
        'status'	=> 'BOOLEAN DEFAULT(0)',
        'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'
    );
    $controller->CreateTable('products', $products,',FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE ON UPDATE NO ACTION');
    //table creation productimages
    $productimages = array(
        'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
        'product_id' => 'INT NOT NULL',
        'image' =>  'VARCHAR(255) NOT NULL',
        'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'
    );
    $controller->CreateTable('productimages', $productimages);
    if(isset($_POST['submitBtn'])){
        extract($_POST);
        $slug = Controller::Slug($name);
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/product/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        if(!empty($image)):
            $saveImage = $path.$uploadFile;
        else:
            $saveImage = null;
        endif;
        if($size != null):
            $jsonSize = json_encode($size);
        else:
            $jsonSize = null;
        endif;
        $arrayValue = array(
            'name'              => $name,
            'slug'              => $slug,
            'category_id'       => $categoryId,
            'subcategory_id'    => $subcategoryId,
            'brand_id'          => $brandId,
            'price'             => $price,
            'sellingprice'      => $sellingprice,
            'qty'               => $qty,
            'sku'               => $sku,
            'size'              => $jsonSize,
            'image'             => $saveImage,
            'alt'               => $alt,
            'short_desc'        => $short_desc,
            'description'       => $description,
            'status'            => $status,
            'metatitle'         => $metatitle,
            'metakeyword'       => $metakeyword,
            'metadescription'   => $metadescription
        );
        $uniquProduct = Controller::UniqueRecord('products','*', array('slug' => $slug));
        if($name != "" && $slug != "" && $categorId =! "" && $subcategoryId != "" && $brandId != "" && $price != "" && $sellingprice != "" && $qty != "" && $sku != ""):
            if($uniquProduct->num_rows < 1):
                $insert = $controller->insertData('products' ,$arrayValue);
                move_uploaded_file($imageTemp,  Controller::public_path("$path"."$uploadFile"));
                if($insert):
                    $path = 'back/images/product/productimages/';
                    foreach($_FILES['files']['name'] as $key => $productimage){
                        $pimageTemp = $_FILES['files']['tmp_name'][$key];
                        $pext = pathinfo($productimage, PATHINFO_EXTENSION); 
                        $moveImage = uniqid().str_replace($productimag,' ','');
                        $uploadFile = $moveImage.'.'.$pext;
                        $saveImage = $path.$uploadFile;
                        $controller->insertData('productimages' ,array('product_id' => $insert, 'image' => $saveImage));
                        move_uploaded_file($pimageTemp,  Controller::public_path("$path"."$uploadFile"));
                    }
                    $_SESSION['success'] = 'Successfully Added !';
                    header('location:'.Controller::ViewPath('back/product/index.php'));
                    exit();
                endif;
            else:
                $_SESSION['alreadyExist'] = 'This product is already exist!';
                $_SESSION['session'] = $arrayValue;
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            endif;
        else:
            $_SESSION['error'] = 'All Fields are required!';
            $_SESSION['session'] = $arrayValue;
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        endif;
    }

    if(isset($_POST['updateBtn'])){
        extract($_POST);
        $productId = (base64_decode($_POST['productId'])/2354125);
        $slug = Controller::Slug($name);
        if($size != null):
            $jsonSize = json_encode($size);
        else:
            $jsonSize = null;
        endif;
        $arrayValue = array(
            'name'              => $name,
            'slug'              => $slug,
            'category_id'       => $categoryId,
            'subcategory_id'    => $subcategoryId,
            'brand_id'          => $brandId,
            'price'             => $price,
            'sellingprice'      => $sellingprice,
            'qty'               => $qty,
            'sku'               => $sku,
            'size'              => $jsonSize,
            'image'             => $saveImage,
            'alt'               => $alt,
            'short_desc'        => $short_desc,
            'description'       => $description,
            'status'            => $status,
            'metatitle'         => $metatitle,
            'metakeyword'       => $metakeyword,
            'metadescription'   => $metadescription
        );

        if($_POST['categoryId'] =! null):
            $uniqueProduct = Controller::UniqueRecord('products','*', array('slug' => $slug));
            $productExist = $controller->selectData('products','*',array('id' => $productId));
            if($productExist[0]['slug'] == $slug):
                $arrayValue = array(
                    'category_id'       => $categoryId,
                    'subcategory_id'    => $subcategoryId,
                    'brand_id'          => $brandId,
                    'price'             => $price,
                    'sellingprice'      => $sellingprice,
                    'qty'               => $qty,
                    'sku'               => $sku,
                    'size'              => $jsonSize,
                    'alt'               => $alt,
                    'short_desc'        => $short_desc,
                    'description'       => $description,
                    'status'            => $status,
                    'metatitle'         => $metatitle,
                    'metakeyword'       => $metakeyword,
                    'metadescription'   => $metadescription
                );
            elseif($productExist[0]['slug'] != $slug):
                if($uniqueProduct->num_rows < 1):
                    $arrayValue = array(
                        'name'              => $name,
                        'slug'              => $slug,
                        'category_id'       => $categoryId,
                        'subcategory_id'    => $subcategoryId,
                        'brand_id'          => $brandId,
                        'price'             => $price,
                        'sellingprice'      => $sellingprice,
                        'qty'               => $qty,
                        'sku'               => $sku,
                        'size'              => $jsonSize,
                        'alt'               => $alt,
                        'short_desc'        => $short_desc,
                        'description'       => $description,
                        'status'            => $status,
                        'metatitle'         => $metatitle,
                        'metakeyword'       => $metakeyword,
                        'metadescription'   => $metadescription
                    );
                else:
                    $arrayValue = array(
                        'category_id'       => $categoryId,
                        'subcategory_id'    => $subcategoryId,
                        'brand_id'          => $brandId,
                        'price'             => $price,
                        'sellingprice'      => $sellingprice,
                        'qty'               => $qty,
                        'sku'               => $sku,
                        'size'              => $jsonSize,
                        'image'             => $saveImage,
                        'alt'               => $alt,
                        'short_desc'        => $short_desc,
                        'description'       => $description,
                        'status'            => $status,
                        'metatitle'         => $metatitle,
                        'metakeyword'       => $metakeyword,
                        'metadescription'   => $metadescription
                    );
                    $_SESSION['alreadyExist']       =       'This product is already exist !';
                endif;
            endif;
            $controller->UpdateData('products',$arrayValue,'id',$productId);
        else:
            $_SESSION['error'] = 'All field are require';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        endif;
        //image upload on update;
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/product/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        $saveImage = $path.$uploadFile;
        if(!empty($image)):
            $controller->UpdateData('products   ',array('image' => $saveImage), 'id', $productId);
            move_uploaded_file($imageTemp, Controller::public_path("$path"."$uploadFile"));
            if(file_exists(Controller::public_path($productExist[0]['image']))):
                unlink(Controller::public_path($productExist[0]['image']));
            endif;
        endif;
        if(!empty($_FILES['files']['name'])){
            $path = 'back/images/product/productimages/';
            foreach($_FILES['files']['name'] as $key => $productImage){
                $pimageTemp = $_FILES['files']['tmp_name'][$key];
                $pext = pathinfo($productImage, PATHINFO_EXTENSION); 
                $moveImage = uniqid().str_replace($productImage,' ','');
                $uploadFile = $moveImage.'.'.$pext;
                $saveImage = $path.$uploadFile;
                $controller->insertData('productimages' ,array('product_id' => $productId, 'image' => $saveImage));
                move_uploaded_file($pimageTemp,  Controller::public_path("$path"."$uploadFile"));
            }
        }
        $_SESSION['success'] = 'Successfully Updated !';
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }

    if(isset($_GET['deleteproduct']) && $_GET['deleteproduct'] == 'delete'){
        $id = base64_decode($_GET['id'])/10352560;
        $controller->DeleteData('products', array('id' => $id));
        $_SESSION['success'] = 'Successfully Deleted !';
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }
?>