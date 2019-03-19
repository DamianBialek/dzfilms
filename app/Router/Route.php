<?php

namespace Router;

class Route
{
    const R_DEFAULT = "[\w]+";

    private $patterns = [
        'route' => '#^[@\/\w]+$#',
        'param' => '#@([\w]+)$#',
        'callback' => "#^[\w\\\\]+@[\w]+$#"
    ];

    private $url;
    private $pattern;
    private $defaultParams;
    private $params;
    private $controller;
    private $controllerMethod;
    private $parsedParams;
    private $callback;
    private $name;

    public function __construct($options)
    {
        $this->defaultParams = !empty($options['defaultParams']) ? $options['defaultParams'] : [];
        $this->validate($options);
        $this->parseRoute($options['path']);
        $this->name = $options['name'];

        if(is_callable($options['callback']))
            $this->callback = $options['callback'];
        else
            $this->parseCallback($options['callback']);
    }

    private function validate($routeOptions)
    {
        if(empty($routeOptions['path']))
            throw new \ErrorException("Routing path is required !");

        if(empty($routeOptions['callback']))
            throw new \ErrorException("Routing callback is required !");
    }

    private function parseRoute($route)
    {
        if (!preg_match($this->patterns['route'], $route, $result)) {
            die("Error route!");
        }

        $this->url = $result[0];
        $this->pattern = $this->preparePattern();
    }

    private function preparePattern()
    {
        $pattern = preg_replace_callback($this->patterns['param'], function($matches) {
            $this->params[] = $matches[1];
            return '('.self::R_DEFAULT.')';
        }, $this->getUrl());

        $pattern = str_replace("/", "\/", $pattern);


        return sprintf('#^%s\/?$#', $pattern);
    }

    private function parseCallback($callback)
    {
        if (!preg_match($this->patterns['callback'], $callback, $result)) {
            throw new \ErrorException("You gave wrong value for routing callback !");
        }

        list($controller, $method) = explode('@', $result[0]);

        if(!class_exists($controller))
            throw new \ErrorException("Class $controller not found !");

        if(!method_exists($controller, $method))
            throw new \ErrorException("Method $method in class $controller not exists!");

        $this->controller = $controller;
        $this->controllerMethod = $method;
    }

    public function parseParams($request)
    {
        preg_match($this->getPattern(), $request->getPathInfo(), $matches);
        preg_match_all($this->patterns['param'], $this->getUrl(), $names);

        unset($matches[0]);
        $values = array_values($matches);

        if(!empty($this->params) && count($values) == count($this->params)) {

            foreach ($this->params as $key => $name) {
                $this->parsedParams[$name] = $values[$key];
            }
        }

        $this->parsedParams = array_merge($this->parsedParams ?: [], $this->defaultParams, $request->getRequestParams());
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getParsedParams()
    {
        return $this->parsedParams;
    }

    public function getCallback()
    {
        if(!empty($this->controller) && !empty($this->controllerMethod)){
            return [new $this->controller(), $this->controllerMethod];
        }

        if(!empty($this->callback) && is_callable($this->callback))
            return $this->callback;
    }

    public function getName()
    {
        return $this->name;
    }
}