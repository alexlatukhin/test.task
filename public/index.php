<?php

use vendor\core\Router;

// начало сессии
session_start();

error_reporting(-1);

$query = rtrim($_SERVER['QUERY_STRING'],'/');

define('WWW',__DIR__);  //точка входа index.php, где мы сейчас и находимся
define('ROOT',dirname(__DIR__));  // корень сайта
define('APP', dirname(__DIR__) . '/app'); //путь до папки app
define('CORE', dirname(__DIR__) . 'vendor/core'); //путь до папки core
define('VENDOR', dirname(__DIR__) . '/vendor'); //путь до папки vendor
define('LAYOUT', 'default'); //дефолтное значение шаблона

require VENDOR . '/autoload.php';

//Автозагрузка классов
spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';

    if (is_file($file))
    {
        require $file;
    }
});

//Default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)$');

Router::dispatch($query);




