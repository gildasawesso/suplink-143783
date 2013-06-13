<?php
session_start();
require_once('../../classes/User.class.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $user = new User($_POST['email'],$_POST['password']);
    if (!$user->already_exist()) {
        header("Location: /login/email");
    }
    else {
        if ($user->log_in()) {
            $_SESSION['logged_id'] = $user->log_in()['id'];
            $_SESSION['logged_email'] = $user->log_in()['email'];
            header("Location: /home");
        }
        else {
            header("Location: /login/password");
        }
    }
}
else {
    header("Location: /home");
}
