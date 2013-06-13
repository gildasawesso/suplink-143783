<?php
session_start();

require_once('../../classes/Link.class.php');

if(isset($_SESSION['logged_id'])) {
    if(isset($_GET['sl']) && isset($_GET['iu'])) {
        if($_GET['iu'] == $_SESSION['logged_id']) {
            $link = new Link();
            $link->remove_link($_GET['sl']);
        }
    }
    else {
        //erreur
    }
    header('Location: /home');

}
else {
    header('Location: /home');
}


