<?php

<<<<<<< HEAD
$router[
    '/'=>'controllers/controllerIndex.php'
];



=======
class Router {
    private $routes = [];

    // public function addRoute($method, $route, $controller, $action) {
    //     $this->routes[$method][$route] = array(
    //         'controller' => $controller,
    //         'action'     => $action
    //     );
    // }

    public function dispatch($uri, $method) {
        if (!isset($this->routes[$method])) {
            // echo "Unsupported method";
            return "Unsupported method";
        }

        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            $controllerName = $handler['controller'];
            $method = $handler['method'];
            $actionName = $handler['action'];
            $Params = $handler['params'];

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $actionName)) {
                    // $controller->$actionName();
                    $controller->$actionName($Params);
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
>>>>>>> d445027cfc050aaefa8a0f0da02751128a41119e
