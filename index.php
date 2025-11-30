<?php

require_once 'Router.php';
require_once 'src/controllers/SecurityController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

$router = new Router();

$router->get('/login', function() {
    $controller = SecurityController::getInstance();
    $controller->displayLogin();
});

$router->post('/login', function() {
    $controller = SecurityController::getInstance();
    $controller->login();
});

$router->get('/register', function() {
    $controller = SecurityController::getInstance();
    $controller->displayRegister();
});

$router->post('/register', function() {
    $controller = SecurityController::getInstance();
    $controller->register();
});

$router->get('/dashboard', function() {
    include 'public/views/dashboard.html';
});

$router->dispatch();