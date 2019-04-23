<?php

//Admin

//Index
$routeCollections->get(new \Router\Route([
    'path' => '/admin',
    'name' => "AdminDashboardIndex",
    'callback' => 'Admin\\Dashboard\\Controller\\DashboardController@index'
]));

//Login
$routeCollections->get(new \Router\Route([
    'path' => '/admin/login',
    'name' => "AdminLogin",
    'callback' => 'Admin\\AdminAuthController@login'
]));
$routeCollections->post(new \Router\Route([
    'path' => '/admin/login',
    'name' => "AdminLogin",
    'callback' => 'Admin\\AdminAuthController@login'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/logout',
    'name' => "AdminLogout",
    'callback' => 'Admin\\AdminAuthController@logout'
]));

//Dashboard
$routeCollections->get(new \Router\Route([
    'path' => '/admin/dashboard',
    'name' => "AdminDashboard",
    'callback' => 'Admin\\Dashboard\\Controller\\DashboardController@index'
]));

//Movies
$routeCollections->get(new \Router\Route([
    'path' => '/admin/movies',
    'name' => "AdminMovies",
    'callback' => 'Admin\\Movie\\Controller\\MovieController@index'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/movies/create',
    'name' => "AdminMoviesCreate",
    'callback' => 'Admin\\Movie\\Controller\\MovieController@create'
]));
$routeCollections->post(new \Router\Route([
    'path' => '/admin/movies/create',
    'name' => "AdminMoviesAddPost",
    'callback' => 'Admin\\Movie\\Controller\\MovieController@store'
]));