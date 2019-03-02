<?php
define("ROOT", __DIR__.'/');

include ROOT.'vendor/autoload.php';

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