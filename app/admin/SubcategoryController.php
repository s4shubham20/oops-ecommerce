<?php
    session_start();
    include_once('../controller.php');
    $controller = new Controller();

    //table creation if not exists 
	$values = array (
			'id' => 'INT NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'category_id' => 'int NOT NULL',
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
    $controller->CreateTable('subcategories', $values, ',FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE ON UPDATE NO ACTION');

    if(isset($_POST['submitBtn'])){
        extract($_POST);
        $slug = Controller::Slug($name);
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/subcategory/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        $saveImage = $path.$uploadFile;
        $array = [
            'category_id' => $categoryId,
            'name' => $name,
            'slug' => $slug,
            'image' => $saveImage,
            'alt' => $alt,
            'metatitle' => $metatitle,
            'metakeyword' => $metakeyword,
            'metadescription' => $metadescription,
            'status' => $status,
        ];
        if($categoryId != "" && $name != "" && $metatitle != ""){
            $condition = array('slug' => $slug);
            $categoryExists = $controller->selectData('category', '*', $condition);
            if($categoryExists[0]['slug'] != $slug){
                $insertSql = $controller->insertData('subcategories',$array);
                if($insertSql){
                    move_uploaded_file($imageTemp,  Controller::public_path("$path"."$uploadFile"));
                    header('location:'.Controller::ViewPath('back/subcategory/index.php'));
                    exit();
                }
            }else{
                $_SESSION['session'] = $array;
                $_SESSION['alreadyExist'] = 'This sub category is already existed';
                $_SESSION['error'] = 'Something went wrong !';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }else{
            $_SESSION['session'] = $array;
            $_SESSION['error'] = 'All field are require';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }

    }

    //Delete section from here !
    if(isset($_GET['deletesubcat']) && $_GET['deletesubcat'] == 'delete'){
        $id = base64_decode($_GET['id'])/1023560;
        $condition = array('id' => $id);
        $selectDelete = $controller->selectData('subcategories', '*', $condition);
        $file = $selectDelete[0]['image'];
        $delete= $controller->DeleteData('subcategories',$condition);
        if($delete):
            if(file_exists(Controller::public_path($file))):
                unlink(Controller::public_path($file));
            endif;
        endif;
        $_SESSION['success'] = 'Successfully deleted !';
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }

    //update section from here;
    if(isset($_POST['updateBtn'])){
        extract($_POST);
        $slug = Controller::Slug($name);
        $subCategoryExist = $controller->selectData('subcategories', '*', array('id' => $subCatId));
        $subCatUnique = Controller::UniqueRecord('subcategories','*', array('slug' => $slug));
        $session = array(
            'name'              =>        $name,
            'category'           =>       $category,
            'alt'                =>       $alt,
            'status'             =>       $status,
            'metatitle'          =>       $metatitle,
            'metakeyword'        =>       $metakeyword,
            'metadescription'    =>       $metadescription,
        );
        if($subCategoryExist[0]['slug'] == $slug):
            $array = [
                'category_id' => $categoryId,
                'alt' => $alt,
                'metatitle' => $metatitle,
                'metakeyword' => $metakeyword,
                'metadescription' => $metadescription,
                'status' => $status,
            ];
        else:
            if($subCatUnique->num_rows < 1):
                $array = [
                    'category_id' => $categoryId,
                    'name' => $name,
                    'slug' => $slug,
                    'alt' => $alt,
                    'metatitle' => $metatitle,
                    'metakeyword' => $metakeyword,
                    'metadescription' => $metadescription,
                    'status' => $status,
                ];
            else:
                $_SESSION['alreadyExist']       =       'This subcategory is already existed !';
                $_SESSION['session']            =        $session;
            endif;
        endif;
            
            
        $controller->UpdateData('subcategories',$array, 'id', $subCatId);
        //image upload on update;
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/subcategory/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        $saveImage = $path.$uploadFile;
        if(!empty($image)):
            $controller->UpdateData('subcategories',array('image' => $saveImage), 'id', $subCatId);
            move_uploaded_file($imageTemp, Controller::public_path("$path"."$uploadFile"));
            if(file_exists(Controller::public_path($subCategoryExist[0]['image']))):
                unlink(Controller::public_path($subCategoryExist[0]['image']));
            endif;
        endif;
        $_SESSION['success'] = 'Successfully Updated !';
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit(0);
    }
?>    