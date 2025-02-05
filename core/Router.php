<?php

class Router {

    private $routes = [
        'register' => [
        'controller' => "class",
        'action' => 'register',
        'params' => ['username', 'email','password', 'role'],
        ],
    ];

    public function dispatch($uri, $method) {
        if (!isset($this->routes[$method])) {
            return "Unsupported method";
        }

        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            $controllerName = $handler['controller'];
            $method = $handler['method'];
            $actionName = $handler['action'];
            $params = $handler['params'];

            if (class_exists($controllerName)) {
                $object = new $controllerName();
                if (method_exists($object, $actionName)) {
                    $inputs = [];
                    foreach ($params as $param) {
                        $inputs[] = $_REQUEST[$param];
                    }
                    call_user_func_array([$object, $method], $inputs);
                    $object->$actionName($params);
                    return;
                } else {
                    echo "Action '$actionName' not found in controller '$controllerName'";
                    return;
                }
            } else {
                echo "Controller '$controllerName' not found";
                return;
            }
        }

        echo "Route not found";
    }
}
