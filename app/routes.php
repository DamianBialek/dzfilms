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
$routeCollections->get(new \Router\Route([
    'path' => '/newest',
    'name' => "newestMovie",
    'callback' => 'Movie\\Controller\\MovieController@newest'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/search',
    'name' => "search",
    'callback' => 'Movie\\Controller\\MovieController@search'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/movie/rent/@id',
    'name' => "RentAMovie",
    'callback' => 'Movie\\Controller\\MovieController@rent'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/movie/give/@id',
    'name' => "GiveAMovie",
    'callback' => 'Movie\\Controller\\MovieController@give'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/movie/reviews/@id',
    'name' => "MovieReview",
    'callback' => 'Movie\\Controller\\MovieController@review'
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
$routeCollections->get(new \Router\Route([
    'path' => '/myaccount',
    'name' => "UserAccount",
    'callback' => 'User\\Controller\\UserController@myAccount'
]));

//Admin
include __DIR__.'/adminRoutes.php';

return $routeCollections;