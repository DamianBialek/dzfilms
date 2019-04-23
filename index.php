<?php
session_start();
define("ROOT", __DIR__.'/');

error_reporting(E_ALL & ~E_NOTICE);

//echo '<pre>';
//print_r($_SESSION);
//exit();


include ROOT.'vendor/autoload.php';
include ROOT.'app/global_functions.php';

try{
    $app = new Application();
    $app->run();
}
catch (\Exception $e) {
    echo $e->getMessage().'<br /><pre>';
    echo $e->getTraceAsString();
//    $errorController = new \Error\Controller\ErrorController();
//    $errorController->displayException($e);
}