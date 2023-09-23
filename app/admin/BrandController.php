<?php
    session_start();
    include_once('../controller.php');
    $controller = new Controller();
    
    //table creation of brand if not exists 
	$brand = array (
        'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
        'category_id' => 'INT NOT NULL',
        'subcategory_id' => 'Text',
        'name' => 'VARCHAR(255) NOT NULL',
        'slug' => 'VARCHAR(255) NOT NULL',
        'image' =>  'VARCHAR(255) NOT NULL',
        'alt' => 'VARCHAR(255) NOT NULL',
        'metatitle' => 'VARCHAR(600) NOT NULL',
        'metakeyword' => 'VARCHAR(600) NOT NULL',
        'metadescription' => 'VARCHAR(600) NOT NULL',
        'status'	=> 'BOOLEAN DEFAULT(0)',
        'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'
    );
    $controller->CreateTable('brands', $brand, ',FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE ON UPDATE NO ACTION');
    
    if(isset($_POST['submitBtn'])){
        extract($_POST);
        $slug = Controller::Slug($name);
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/brand/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        if(!empty($image)):
            $saveImage = $path.$uploadFile;
        else:
            $saveImage = null;
        endif;
        $arrayValue = [
            'name' => $name,
            'slug' => $slug,
            'category_id' => $categoryId,
            'subcategory_id' => json_encode($subcategoryId),
            'image' => $saveImage,
            'alt'   => $alt,
            'status' => $status,
            'metatitle' => $metatitle,
            'metakeyword' => $metakeyword,
            'metadescription' => $metadescription,
        ];
        if ($name != "" && $categoryId != "" && $subcategoryId != ""):
            $ExistsBrand = $controller->selectData('brands','*', array('slug' => $slug));
            if($ExistsBrand[0]['slug'] != $slug):
                $insertSql = $controller->insertData('brands',$arrayValue);
                if($insertSql):
                    $_SESSION['success'] = 'Successfully Added !';
                    move_uploaded_file($imageTemp,  Controller::public_path("$path"."$uploadFile"));
                    header('location:'.Controller::ViewPath('back/brand/index.php'));
                    exit();
                endif;
            else:
                $_SESSION['session'] = $arrayValue;
                $_SESSION['alreadyExist'] = 'This brand is already existed';
                $_SESSION['error'] = 'Something went wrong !';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();    
            endif;
        else:
            $_SESSION['session'] = $arrayValue;
            $_SESSION['error'] = 'All field are require';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        endif;
    }

    //delete section start form here

    if(isset($_GET['deletebrand']) && $_GET['deletebrand'] == 'delete'):
        $id = base64_decode($_GET['id'])/1035560;
        $file = $controller->selectData('brands','*', array('id' => $id));
        $deleteSql = $controller->DeleteData('brands',array('id' => $id));
        if($deleteSql):
            if(file_exists(Controller::public_path($file[0]['image']))):
                unlink(Controller::public_path($file[0]['image']));
            endif;
        endif;
        $_SESSION['success'] = 'Successfully deleted !';
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    endif;

    //update section

    if(isset($_POST['updateBtn'])){
        extract($_POST);
        $slug = Controller::Slug($name);
        $session = [
            'name' => $name,
            'slug' => $slug,
            'category_id' => $categoryId,
            'subcategory_id' => json_encode($subcategoryId),
            'alt'   => $alt,
            'status' => $status,
            'metatitle' => $metatitle,
            'metakeyword' => $metakeyword,
            'metadescription' => $metadescription,
        ];
        if ($name != "" && $categoryId != "" && $subcategoryId != ""):
            $brandExist = $controller->selectData('brands', '*', array('id' => $brandId));
            $brandUnique = Controller::UniqueRecord('brands','*', array('slug' => $slug));
            if($brandExist[0]['slug'] == $slug):
                $arrayValue = [
                    'category_id' => $categoryId,
                    'subcategory_id' => json_encode($subcategoryId),
                    'alt'   => $alt,
                    'status' => $status,
                    'metatitle' => $metatitle,
                    'metakeyword' => $metakeyword,
                    'metadescription' => $metadescription,
                ];
            elseif($brandExist[0]['slug'] != $slug):
                if($brandUnique->num_rows < 1):
                    $arrayValue = [
                        'name' => $name,
                        'slug' => $slug,
                        'category_id' => $categoryId,
                        'subcategory_id' => json_encode($subcategoryId),
                        'alt'   => $alt,
                        'status' => $status,
                        'metatitle' => $metatitle,
                        'metakeyword' => $metakeyword,
                        'metadescription' => $metadescription,
                    ];
                else:
                    $arrayValue = array(
                            'category_id' => $categoryId,
                            'subcategory_id' => json_encode($subcategoryId),
                            'alt'   => $alt,
                            'status' => $status,
                            'metatitle' => $metatitle,
                            'metakeyword' => $metakeyword,
                            'metadescription' => $metadescription,
                        );
                    $_SESSION['alreadyExist']       =       'This brand is already exist !';
                    $_SESSION['session']            =        $session;
                endif;
            endif;
            $controller->UpdateData('brands',$arrayValue,'id',$brandId);
        else:
            $_SESSION['session'] = $session;
            $_SESSION['error'] = 'All field are require';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        endif;
        //image upload on update;
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/brand/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        $saveImage = $path.$uploadFile;
        if(!empty($image)):
            $controller->UpdateData('brands',array('image' => $saveImage), 'id', $brandId);
            move_uploaded_file($imageTemp, Controller::public_path("$path"."$uploadFile"));
            if(file_exists(Controller::public_path($brandExist[0]['image']))):
                unlink(Controller::public_path($brandExist[0]['image']));
            endif;
        endif;
        $_SESSION['success'] = 'Successfully Updated !';
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }

?>