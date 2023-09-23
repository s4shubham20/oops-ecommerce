<?php 
    session_start();
    include_once('../controller.php');
    $controller = new Controller();
    if(isset($_POST['loginBtn'])){
        $email = $controller->mysqli_safe_string($_POST['email']);
        $password = $controller->mysqli_safe_string($_POST['password']);

        $condition = ['email' => $email];
        $checkUser = $controller->selectData('users','*', $condition);
        if($email != "" && $password != ""){
            if($checkUser[0]['email'] == $email && $checkUser[0]['role_id'] == 1){
                if(password_verify($password, $checkUser[0]['password'])){
                    $_SESSION['email'] = $checkUser[0]['email'];
                    $_SESSION['success'] = 'You have successfully logged in !';
                    header('location:../../views/back/admin/index.php');
                    exit(0);
                }else{
                    $_SESSION['oldemail'] = $email;
                    $_SESSION['error'] = 'Password doesn\'t match !';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    exit(0);
                }
            }elseif($checkUser[0]['email'] == $email && $checkUser[0]['role_id'] == 0){
                if(password_verify($password, $checkUser[0]['password'])){
                    $_SESSION['email'] = $checkUser[0]['email'];
                    $_SESSION['userId'] = $checkUser[0]['id'];
                    $_SESSION['success'] = 'You have successfully logged in !';
                    if(basename(Controller::ViewPath('front/checkout.php')) == 'checkout.php'){
                        header('location:'.Controller::ViewPath('front/checkout.php'));
                        exit(0);
                    }else{
                        header('location:'.Controller::ViewPath('front/index.php'));
                        exit(0);
                    }
                }else{
                    $_SESSION['oldemail'] = $email;
                    $_SESSION['error'] = 'Password doesn\'t match !';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    exit(0);
                }
            }else{
                $_SESSION['oldemail'] = $email;
                $_SESSION['error'] = 'Email doesn\'t match !';
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit(0);
            }   
        }else{
            $_SESSION['oldemail'] = $email;
            $_SESSION['error'] = 'Required field can\'t blank !';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit(0);
        }
    }

    if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
        $checkUser = $controller->selectData('users','*',array('id' => $_SESSION['userId']));
        if($checkUser[0]['role_id'] == 1){
            $controller->SessionDestroy();
            header('location:'.Controller::ViewPath('auth/login.php'));

        }else{
            $controller->SessionDestroy();
            header('location:'.Controller::ViewPath('front/login.php'));
        }
        session_start();
        $_SESSION['success'] = 'You have successfully logout!';
    }

?>