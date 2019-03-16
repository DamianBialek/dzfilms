<?php

use Documents\Controller\DocumentsController;
use Warehouse\Controller\WarehouseController;
use Movie\Controller\MovieController;
use Auth\Controller\AuthController;

class Application {
    private $config;
    
    public function __construct() {
        $this->loadConfig();
    }
    
    private function loadConfig(){
        $fileName = ROOT.'config.php';
        
        if(file_exists($fileName)){
            $this->config = include $fileName;
            return true;
        }
        
        throw new Exception("File ".$fileName.' Not Found');
    }

    public function run()
    {
        $controllerName = (isset($_GET['mod']) && $_GET['mod'] ? $_GET['mod'] : 'home');

        $map = [
            "home" => HomeController::class,
            "movie" => MovieController::class
        ];

        if(!isset($map[$controllerName])){
            header("Location: index.php");
            exit();
        }

        $controllerName = $map[$controllerName];

        $action = (isset($_GET['a']) && $_GET['a'] ? $_GET['a'] : 'index');

//        if(!$this->isAuth() && $controllerName !== AuthController::class)
//            $this->redirectToAuth();

        $controller = new $controllerName();
        
        if(method_exists($controller, $action))
            $controller->$action();
        else
            $controller->index();    
    }

    public function redirectToAuth()
    {
        header("Location: index.php?mod=login");
        exit();
    }

    public function isAuth()
    {
        return AuthController::checkAuth();
    }
}
