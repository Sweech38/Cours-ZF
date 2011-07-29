<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__FILE__)) );
define('TPL_PATH', ROOT_PATH . DS . 'public' . DS . 'templates' );

session_start(); # Ouverture des sessions

require_once('library/Actu.php');
require_once('library/User.php');
require_once('library/Db.php');

date_default_timezone_set('Europe/Paris'); # Définition du Time Zone


if (!User::isConnected()) {
    $page = 'connexion.php';
} else {
    $page = ltrim($_SERVER['REQUEST_URI'], '/');
    if ('' === $page){
        $page = 'actu.php';
    }
}


ob_start();
require_once('pages/' . $page);
$pageContent = ob_get_contents();
ob_end_clean();

require_once(TPL_PATH . DS . 'layout.php');

