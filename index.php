<?php

require_once 'Router.php';
require_once 'src/controllers/SecurityController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

$router = new Router();

// TODO Controller singletons
$router->get('/login', function() {
    $controller = new SecurityController();
    $controller->login();
});

$router->get('/register', function() {
    $controller = new SecurityController();
    $controller->register();
});

$router->get('/dashboard', function() {
    include 'public/views/dashboard.html';
});

$router->dispatch();