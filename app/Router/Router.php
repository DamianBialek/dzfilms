<?php

namespace Router;

use Router\Exception\RouterNotFoundException;

class Router
{
    private $request;
    private $routeCollections;

    public function __construct($request, $routeCollections)
    {
        $this->request = $request;
        $this->routeCollections = $routeCollections;
    }

    public function run()
    {
        $routes = $this->routeCollections->getRoutesByMethod($this->request->getRequestMethod());

        if(empty($routes))
            return false;

        foreach ($routes as $route) {
            if(!$this->match($route))
                continue;

            $route->parseParams($this->request);

            return $route;
        }

        throw new RouterNotFoundException();
    }

    private function match($route)
    {
        if(!preg_match($route->getPattern(), $this->request->getPathInfo()))
            return false;

        return true;
    }
}