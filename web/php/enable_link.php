<?php
session_start();

require_once('../../classes/Link.class.php');

if(isset($_SESSION['logged_id'])) {
    if(isset($_GET['sl']) && isset($_GET['iu']) && isset($_GET['en'])) {
        if($_GET['iu'] == $_SESSION['logged_id']) {
            $link = new Link();
            if($_GET['en'] == 'enable') {
                $link->enable_link($_GET['sl']);
            }
            elseif($_GET['en'] == 'disable') {
                $link->disable_link($_GET['sl']);
            }
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


