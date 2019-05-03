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
$routeCollections->get(new \Router\Route([
    'path' => '/admin/movies/edit/@id',
    'name' => "AdminMoviesEdit",
    'callback' => 'Admin\\Movie\\Controller\\MovieController@show'
]));
$routeCollections->post(new \Router\Route([
    'path' => '/admin/movies/update',
    'name' => "AdminMoviesUpdate",
    'callback' => 'Admin\\Movie\\Controller\\MovieController@update'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/movies/remove/@id',
    'name' => "AdminMoviesRemove",
    'callback' => 'Admin\\Movie\\Controller\\MovieController@destroy'
]));

//Customers
$routeCollections->get(new \Router\Route([
    'path' => '/admin/customers',
    'name' => "AdminCustomers",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@index'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/customers/create',
    'name' => "AdminCustomerCreate",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@create'
]));
$routeCollections->post(new \Router\Route([
    'path' => '/admin/customers/create',
    'name' => "AdminCustomerCreatePost",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@store'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/customers/edit/@id',
    'name' => "AdminCustomersEdit",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@show'
]));
$routeCollections->post(new \Router\Route([
    'path' => '/admin/customers/update',
    'name' => "AdminCustomersUpdate",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@update'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/customers/remove/@id',
    'name' => "AdminCustomersRemove",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@destroy'
]));
$routeCollections->get(new \Router\Route([
    'path' => '/admin/customers/statistics/@id',
    'name' => "AdminCustomerStatistics",
    'callback' => 'Admin\\Customers\\Controller\\CustomerController@statistics'
]));