<?php

namespace Router;

class RouteCollections
{
    private $routes = [];

    public function add($method, $route)
    {
        $this->routes[strtoupper($method)][$route->getName()] = $route;
    }

    public function get($route)
    {
        $this->add("GET", $route);
    }

    public function post($route)
    {
        $this->add("POST", $route);
    }

    public function getAllRoutes()
    {
        return $this->routes;
    }

    public function getRoutesByMethod($requestMethod)
    {
        if(isset($this->routes[$requestMethod]))
            return $this->routes[$requestMethod];

        return false;
    }
}