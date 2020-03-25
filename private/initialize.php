<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    defined('SITE_ROOT') ? null :
        define('SITE_ROOT', DS.'Documents'.DS.'xampp'.DS.'htdocs'.DS.'web_prog6');
        //define('SITE_ROOT', DS.'Users'.DS.'30010353'.DS.'Desktop'.DS.'xampp'.DS.'htdocs'.DS.'web_prog6');

    defined('SHARED_PATH') ? null :
        define('SHARED_PATH', SITE_ROOT.DS.'private');

    
    require_once(SHARED_PATH.DS.'session.php');
    require_once(SHARED_PATH.DS.'database.php');
    require_once(SHARED_PATH.DS.'db_credentials.php');
    require_once(SHARED_PATH.DS.'functions.php');

?>