<?php

namespace MVC;


$router = new Router();


$router->addRoute('/', 'app\Controllers\HomeController', 'index');
$router->addRoute('/team', 'app\Controllers\TeamController', 'index');
$router->addRoute('/team/create', 'app\Controllers\TeamController', 'create');
$router->addRoute('/team/edit/(\d+)', 'app\Controllers\TeamController', 'edit'); // Example with a parameter
$router->addRoute('/team/delete/(\d+)', 'app\Controllers\TeamController', 'delete'); // Example with a parameter

// Dispatch the request based on the URI
$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
    