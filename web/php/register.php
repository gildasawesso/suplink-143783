<?php 
require_once('../../classes/User.class.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $user = new User($_POST['email'],$_POST['password']);
    if (!$user->already_exist()) {
        if ($_POST['password'] !== $_POST['password-confirm']) {
            header("Location: /register/password");
        }
        elseif (!preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$_POST['email'])) {
            header("Location: /register/email");
        }
        else {
            $user->register();
            header("Location: /login");
        }
    }
    else {
        header("Location: /register/account");
    }
}
else {
    header("Location: /home");
}
