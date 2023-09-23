<?php
    session_start();
    include_once('../controller.php');
    $post = new Controller();

    if(isset($_POST['submit'])){
        $name = $post->mysqli_safe_string($_POST['name']);
        $slug = Controller::Slug($name);
        $category = $post->mysqli_safe_string($_POST['category']);
        $alt = $post->mysqli_safe_string($_POST['alt']);
        $status = $post->mysqli_safe_string($_POST['status']);
        $description = $post->mysqli_safe_string($_POST['description']);
        $metatitle = $post->mysqli_safe_string($_POST['metatitle']);
        $metakeyword = $post->mysqli_safe_string($_POST['metakeyword']);
        $metadescription = $post->mysqli_safe_string($_POST['metadescription']);
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $path = 'back/images/post/';
        $moveImage = uniqid().preg_replace('/[^A-Za-z0-9\-]/', '.', $image);
        $saveImage = $path.$moveImage;
        $condition = array('slug' => $slug);
        print_r($condition);
        $postAlready = Controller::UniqueRecord('blogs', '*', $condition);
        $session = array(
            'title'              =>       $name,
            'category'           =>       $category,
            'alt'                =>       $alt,
            'metatitle'          =>       $metatitle,
            'metakeyword'        =>       $metakeyword,
        );
        $arrayValue = array(
            'title'             =>      $name,
            'slug'              =>      $slug,
            'category_id'       =>      $category,
            'alt'               =>      $alt,
            'image'             =>      $saveImage,
            'status'            =>      $status,
            'description'       =>      $description,
            'metatitle'         =>      $metatitle,
            'metakeyword'       =>      $metakeyword,
            'metadescription'   =>      $metadescription,
        );
        if(!empty( $name ) && $category != null){
            if($postAlready->num_rows < 1){
                $insertPost = $post->insertData('blogs', $arrayValue);
                move_uploaded_file($imageTemp, Controller::public_path("$path"."$moveImage"));
                if($insertPost){
                    $_SESSION['success'] = 'Successfully Added';
                    header('location:../../views/back/post/index.php');
                    exit();
                }else{
                    $_SESSION['session']  =         $session;
                    $_SESSION['error']    =         'Something went wrong';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }else{
                $_SESSION['session']    =       $session;
                $_SESSION['error']      =       'This post is already existed !';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }else{
            $_SESSION['error']        =     'All mandatory fields are required !';
            $_SESSION['session']      =     $session;
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

if(isset($_GET['deletepost']) && $_GET['deletepost'] == 'delete'){
    $id = base64_decode($_GET['id'])/10234560;
    $condition = array('id' => $id);
    $deleteFile = $post->selectData('blogs','*',$condition);
    $delete = $post->DeleteData('blogs',$condition);
    if($delete){
        if(file_exists(Controller::public_path($deleteFile[0]['image']))){
            unlink(Controller::public_path($deleteFile[0]['image']));
        }
    }
    $_SESSION['success'] = 'Successfully Deleted!';
    header('location:'.$_SERVER['HTTP_REFERER']);

}

if(isset($_POST['updateBtn'])){
    $postId = $post->mysqli_safe_string($_POST['postId']);
    $name = $post->mysqli_safe_string($_POST['name']);
    $slug = Controller::Slug($name);
    $category = $post->mysqli_safe_string($_POST['category']);
    $alt = $post->mysqli_safe_string($_POST['alt']);
    $status = $post->mysqli_safe_string($_POST['status']);
    $description = $post->mysqli_safe_string($_POST['description']);
    $metatitle = $post->mysqli_safe_string($_POST['metatitle']);
    $metakeyword = $post->mysqli_safe_string($_POST['metakeyword']);
    $metadescription = $post->mysqli_safe_string($_POST['metadescription']);
    $condition = array('slug' => $slug);
    $id = array('id' => $postId);
    $postExists = $post->selectData('blogs','*',$id);
    $postUnique = Controller::UniqueRecord('blogs', '*', $condition);
    $session = array(
        'title'              =>       $name,
        'category'           =>       $category,
        'alt'                =>       $alt,
        'status'             =>       $status,
        'metatitle'          =>       $metatitle,
        'metakeyword'        =>       $metakeyword,
    );
    if($postExists[0]['slug'] == $slug){
        $arrayValue = array(
            'category_id'       => $category,
            'alt'               => $alt,
            'status'            => $status,
            'description'       => $description,
            'metatitle'         => $metatitle,
            'metakeyword'       => $metakeyword,
            'metadescription'   => $metadescription
        );
    }elseif($postExists[0]['slug'] != $slug){
        if($postUnique->num_rows < 1){
            $arrayValue = array(
                'title'             => $name,
                'slug'              => $slug,
                'category_id'       => $category,
                'alt'               => $alt,
                'status'            => $status,
                'description'       => $description,
                'metatitle'         => $metatitle,
                'metakeyword'       => $metakeyword,
                'metadescription'   => $metadescription
            );
        }else{
            $arrayValue = [
                    'category_id'       => $category,
                    'alt'               => $alt,
                    'status'            => $status,
                    'description'       => $description,
                    'metatitle'         => $metatitle,
                    'metakeyword'       => $metakeyword,
                    'metadescription'   => $metadescription
            ];
            $_SESSION['alreadyExist']       =       'This post is already existed !';
            $_SESSION['session']            =        $session;
        }
    }
    $post->UpdateData('blogs',$arrayValue, 'id', $postId); 
    $image = $_FILES['image']['name'];
    $imageTemp = $_FILES['image']['tmp_name'];
    $path = 'back/images/post/';
    $imageext = pathinfo($image, PATHINFO_EXTENSION);
    $imageName = basename($image,".".$imageext);
    $replaceName = uniqid().preg_replace('/[^A-Za-z0-9\-]/', '', $imageName);
    $moveImage = $replaceName.'.'.$imageext;
    $saveImage = $path.$moveImage;
    $arrayValue = array('image' => $saveImage);
    if(!empty($image)){
        $updatePost = $post->UpdateData('blogs',$arrayValue, 'id', $postId);
        move_uploaded_file($imageTemp, Controller::public_path("$path"."$moveImage"));
        if(file_exists(Controller::public_path($postExists[0]['image']))){
            unlink(Controller::public_path($postExists[0]['image']));
        }
    }
    $_SESSION['success'] = 'Successfully Updated !';
    header('location:'.$_SERVER['HTTP_REFERER']);
}