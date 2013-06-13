<?php
session_start();

require_once('../../classes/Link.class.php');

if(isset($_SESSION['logged_id'])) {
    if(isset($_POST['name']) && isset($_POST['long_url'])) {
        $link = new Link();
        $link->create_link($_SESSION['logged_id'],htmlentities($_POST['name']),htmlentities($_POST['long_url']));
    }
    else {
        //erreurs
    }
    header('Location: /home');

}
else {
    header('Location: /home');
}


