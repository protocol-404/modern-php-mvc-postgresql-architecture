<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

// Initialize the router
$router = new Router();

// Get the request URI and method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

$method = $_SERVER['REQUEST_METHOD'];

// Dispatch the request
try {
    $router->dispatch($uri, $method);
} catch (Exception $e) {
    // Basic error handling
    http_response_code(500);
    echo "Internal Server Error: " . $e->getMessage();
}