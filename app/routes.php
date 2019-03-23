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

//User
$routeCollections->get(new \Router\Route([
    'path' => '/login',
    'name' => "UserLogin",
    'callback' => 'User\\Controller\\UserController@login'
]));
$routeCollections->post(new \Router\Route([
    'path' => '/login',
    'name' => "UserSingIn",
    'callback' => 'User\\Controller\\UserController@signIn'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/logout',
    'name' => "UserLogout",
    'callback' => 'User\\Controller\\UserController@logout'
]));

return $routeCollections;