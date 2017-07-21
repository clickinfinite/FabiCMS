<?php
use core\Router;

error_reporting(-1);

require '../core/libs/fnc.php';

define('PATH', [
    'root' => dirname(__DIR__),
    'app' => dirname(__DIR__) . '/app',
    'core' => dirname(__DIR__) . '/core',
    'public' => dirname(__DIR__) . '/public',
    ]);

define('LAYOUT', 'new');

define('FABI', 001);

spl_autoload_register(function($classname) {
    if($classname == 'Fenom') {    
        require '../core/libs/Fenom/src/Fenom.php';
        return;
    }
    
     $file = PATH['root'] . '/'. str_replace('\\', '/', $classname).'.php';
     if(is_file($file)){
         require $file;        
     }
});

Router::start();

