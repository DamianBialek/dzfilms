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
    
    private function loadConfig()
    {
        $fileName = ROOT.'config.php';
        
        if(file_exists($fileName)){
            $this->config = include $fileName;
            return true;
        }
        
        throw new Exception("File ".$fileName.' Not Found');
    }

    private function loadRoutes()
    {
        $fileName = __DIR__.'/routes.php';

        if(file_exists($fileName)){
            return include $fileName;
        }

        throw new Exception("File ".$fileName.' Not Found');
    }

    public function run()
    {
        $request = new \Router\RouteRequest();
        $router = new \Router\Router($request, $this->loadRoutes());

        $route = $router->run();

        call_user_func_array($route->getCallback(), [$route->getParsedParams(), $request]);
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
