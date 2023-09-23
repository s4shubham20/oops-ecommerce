<?php
    session_start();
    include_once('../controller.php');
    $registerUser = new Controller();
    if(isset($_POST['registerBtn'])){
        $name = $registerUser->mysqli_safe_string($_POST['username']);
        $email = $registerUser->mysqli_safe_string($_POST['email']);
        $password = $registerUser->mysqli_safe_string($_POST['password']);
        $confirmpassword = $registerUser->mysqli_safe_string($_POST['confirmpassword']);
        $condition = array('email' => $email);
        $checkUser = $registerUser->selectData('users','*', $condition);
        if($email != "" && $password != "" && $name != ""){
            if($checkUser[0]['email'] != $email){
                if($password == $confirmpassword){
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $condition = array('name' => $name, 'email' => $email, 'password' => $hashedPassword);
                    $user = $registerUser->insertData('users',$condition);
                    if($user){
                        $_SESSION['email'] = $email;
                        $_SESSION['success'] = 'You have successfully registered';
                        header('location:../../views/back/admin/index.php');
                        exit(0);
                    }
                }else{
                    $_SESSION['oldname'] = $name;
                    $_SESSION['oldemail'] = $email;
                    $_SESSION['error'] = "Confirm password doesn'\t match";
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    exit(0);
                }
            }else{
                $_SESSION['oldname'] = $name;
                $_SESSION['oldemail'] = $email;
                $_SESSION['error'] = "Your email is already exist";
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit(0);
            }
        }else{
            $_SESSION['oldname'] = $name;
            $_SESSION['oldemail'] = $email;
            $_SESSION['error'] = 'Required field can\'t blank!';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit(0);
        }
    }
?>