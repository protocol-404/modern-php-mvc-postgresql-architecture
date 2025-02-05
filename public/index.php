<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
