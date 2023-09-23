<?php
    session_start();
    include_once('../controller.php');
    $category = new Controller();
    // $post = new Controller();

    //create new record
    if(isset($_POST['submit'])){
        $name = $category->mysqli_safe_string($_POST['name']);
        $slug = Controller::Slug($name);
        $status = $category->mysqli_safe_string($_POST['status']);
        $alt = $category->mysqli_safe_string($_POST['alt']);
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/category/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        $saveImage = $path.$uploadFile;
        if($name != "" && $alt != "" && $image != ""){
            $condition = array('name' => $name);
            $categoryExists = $category->selectData('category', '*', $condition);
            if($categoryExists[0]['slug'] != $slug){
                $arrayData = array('name' => $name, 'slug' => $slug, 'status' => $status, 'image' => $saveImage, 'alt'=> $alt);
                $query = $category->insertData('category',$arrayData);
                if($query){
                    move_uploaded_file($imageTemp,  Controller::public_path("$path"."$uploadFile"));
                    $_SESSION['success'] = 'Successfully Added';
                    header('location:'.Controller::ViewPath('back/category/index.php'));
                    exit();
                }else{
                    $_SESSION['name'] = $name;
                    $_SESSION['alt'] = $alt;
                    $_SESSION['error'] = 'Something went wrong';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }else{
                $_SESSION['name'] = $name;
                $_SESSION['alt'] = $alt;
                $_SESSION['error'] = 'This category already exists';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }else{
            $_SESSION['name'] = $name;
            $_SESSION['alt'] = $alt;
            $_SESSION['error'] = 'All fields are required';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    //update section 

    if(isset($_POST['updateBtn'])){
        $id = $category->mysqli_safe_string($_POST['category_id']);
        $name = $category->mysqli_safe_string($_POST['name']);
        $slug = Controller::Slug($name);
        $array = array('id' => $id);
        $categoryExists = $category->selectData('category','*',$array);
        $status = $category->mysqli_safe_string($_POST['status']);
        $alt = $category->mysqli_safe_string($_POST['alt']);
        $condition = array('slug' => $slug);
        $categoryUnique = Controller::UniqueRecord('category', '*', $condition);
        if($categoryExists[0]['slug'] == $slug){
            $array = array('alt' => $alt,'status' => $status);
        }elseif($categoryExists[0]['slug'] != $slug){
            
            if($categoryUnique->num_rows < 1){
                $array = array('name' => $name,'slug' => $slug,'alt'=> $alt,'status' => $status);
            }else{
                $array = array('alt' => $alt,'status' => $status);
                $_SESSION['alreadyExist']= 'This category is already existed !';
            }
        }
        $category->UpdateData('category',$array,'id' ,$id);
        
        //image uploading section--
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/category/';
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $moveImage = uniqid().str_replace($image,' ','');
        $uploadFile = $moveImage.'.'.$ext;
        $saveImage = $path.$uploadFile;
        if(!empty($_FILES['image']['name'])){
            $array = array('image' => $saveImage);
            $category->UpdateData('category',$array,'id' ,$id);
            move_uploaded_file($imageTemp, Controller::public_path("$path"."$uploadFile"));
            $imageRemove = $categoryExists[0]['image'];
            if(file_exists(Controller::public_path($imageRemove))){
                unlink(Controller::public_path($imageRemove));
            }
        }
        $_SESSION['success']=  'Successfully updated!';
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

    //Delete category section
    if(isset($_GET['type']) && $_GET['type']=='delete'){
        $id = base64_decode($_GET['id'])/1023456;
        $array = array('id'=> $id);
        $file = $category->selectData('category','*',$array);
        //if delete parent record (category) delete all his child relation on delete cascade
        $condition = array('category_id' => $id);
        $posts = $category->selectData('blogs','*', $condition);
        $subcategories = $category->selectData('subcategories','*', $condition);
        $brands = $category->selectData('brands','*', $condition);

        if($subcategories != null):
            foreach($subcategories as $key => $item){
                $subcategories_image = $item['image'];
                if(file_exists(Controller::public_path($subcategories_image))){
                    unlink(Controller::public_path($subcategories_image));
                }
            }
        endif;

        if($brands != null):
            foreach($brands as $key => $item){
                $brandImage = $item['image'];
                if(file_exists(Controller::public_path($brandImage))){
                    unlink(Controller::public_path($brandImage));
                }
            }
        endif;

        if($posts != null){
            foreach($posts as $key => $item){
                $postimage = $item['image'];
                if(file_exists(Controller::public_path($postimage))){
                    unlink(Controller::public_path($postimage));
                }
            }
        }
        $delete = $category->DeleteData('category',$array);
        if($delete){
            if(file_exists(Controller::public_path($file[0]['image']))){
                unlink(Controller::public_path($file[0]['image']));
            }
           $_SESSION['success'] = 'Successfully Deleted';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    
?>