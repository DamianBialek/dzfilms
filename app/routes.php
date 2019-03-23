<?php
$routeCollections = new \Router\RouteCollections();
$routeCollections->get(new \Router\Route([
    'path' => '/',
    'name' => "home",
    'callback' => 'HomeController@index'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/movie/@id',
    'name' => "movie",
    'callback' => 'Movie\\Controller\\MovieController@show'
]));

return $routeCollections;