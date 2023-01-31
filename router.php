<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
/*
if ($uri === '/'){
    include 'controllers/index.php';
} else if ($uri === '/about'){
    include 'controllers/about.php';
} else if ($uri === '/contact') {
    include 'controllers/contact.php';
}
*/
$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];


function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)){
        include $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404){
    http_response_code($code);

    include "views/{$code}.php";

    die();
}


routeToController($uri, $routes);