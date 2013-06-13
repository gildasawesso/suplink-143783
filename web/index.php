<?php

require_once('../classes/Link.class.php');
require_once('../classes/User.class.php');

session_start();



if(isset($_GET['param1'])) {
    if($_GET['param1'] == 'home' || $_GET['param1'] == '') {
        include_once('../page/home.php');
    }
    elseif($_GET['param1'] == 'login') {
        if(isset($_SESSION['logged_id'])) {
            include_once('../page/home.php');
        }
        else {
            include_once('../page/login.php');
        }
    }
    elseif($_GET['param1'] == 'register') {
        if(isset($_SESSION['logged_id'])) {
            include_once('../page/home.php');
        }
        else {
            include_once('../page/register.php');
        }
    }
    elseif($_GET['param1'] == 'logout') {
        unset($_SESSION['logged_id']);
        unset($_SESSION['logged_email']);
        header("Location: /home");
    }
    elseif($_GET['param1'] == 'stats') {
        include_once('../page/stats.php');

    }
    else {
        $link = new Link();
        $long_link = $link->get_link_fromUrl($_GET['param1']);


        if($long_link) {
            if(!$link->get_enable_fromUrl($_GET['param1'])['enable']) {
                echo 'DESACTIVED LINK';
            }
            else {
                $link->add_click($_GET['param1']);
                header('Location: '.$link->get_link_fromUrl($_GET['param1'])['long_link']);
            }
        }
        else {
            echo 'THIS LINK DOESN\'T EXISTS';
        }

    }
}
else {
    include_once('../page/home.php');
}


?>
