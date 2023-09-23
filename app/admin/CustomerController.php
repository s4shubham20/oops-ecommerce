<?php
    session_start();
    include_once('../controller.php');
    $controller = new Controller();
    if(isset($_POST['loginBtn'])){
        print_r($_POST);
        $email = $controller->mysqli_safe_string($_POST['email']);
        $password = $controller->mysqli_safe_string($_POST['password']);
    }
?>