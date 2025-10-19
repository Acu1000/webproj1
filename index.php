<?php

require_once 'Router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

$router = new Router();

$router->get('/login', function() {
    include 'public/views/login.html';
});

$router->get('/dashboard', function() {
    include 'public/views/dashboard.html';
});

$router->dispatch();