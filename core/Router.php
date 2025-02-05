<?php

namespace Core;

use App\Controllers\UserController;

class Router {

    private $routes = [
            'signup' => [
                'controller' => UserController::class,
                'action' => 'signUp',
                'method' => 'POST',
                'params' => ['username', 'email','password'],
            ],
            'register' => [
                'controller' => UserController::class,
                'action' => 'register',
                'method' => 'POST',
                'params' => [],
            ],
    ];

    public function dispatch($uri, $method) {
        if (!isset($this->routes[$uri])) {
            echo "Unsupported method";
            print_r($this->routes);
            return "Unsupported method";
        }

        if (isset($this->routes[$uri])) {
            $handler = $this->routes[$uri];
            $controllerName = $handler['controller'];
            // $method = $handler['method'];
            $actionName = $handler['action'];
            $params = $handler['params'];

            if (class_exists($controllerName)) {
                $object = new $controllerName();
                // print_r($object);
                if (method_exists($object, $actionName)) {
                    $inputs = [];
                    foreach ($params as $param) {
                        if (isset($_REQUEST[$param])) {
                            $inputs[] = $_REQUEST[$param];
                        } else {
                            echo "Missing required parameter: $param";
                            return;
                        }
                    }
                    $object->$actionName(...$inputs);
                    return;
                } else {
                    echo "Action '$actionName' not found in controller '$controllerName'";
                    return;
                }
            } else {
                echo "Controller '$controllerName' not found";
                return;
            }
        }else{
            echo "Route not found";
            return;
        }
    }
}
