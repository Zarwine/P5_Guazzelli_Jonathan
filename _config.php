<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

class MyAutoLoad
{
    public static function start()
    {

        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];
        
        define('HOST', 'https://'.$host."/");
        define('ROOT', $root.'/Portfolio/');
        
        define("CONTROLLER", ROOT.'controller/');
        define("VIEW", ROOT."view/");
        define("MODEL", ROOT."model/");
        define("CLASSES", ROOT.'classes/');
        
        define("ASSETS", HOST."/Portfolio/assets/");
    }

    public static function autoload($class)
    {
        if(file_exists(MODEL.$class.'.php'))
        {
            include_once (MODEL.$class.'.php');
        } else if (file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');
        } else if (file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');
        };
    }
}
