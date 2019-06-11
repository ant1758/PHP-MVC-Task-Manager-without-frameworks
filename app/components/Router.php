<?php

class Router {

    private $routes = [
        'task/([0-9]+)' => 'task/view/$1',
        'task/edit/([0-9]+)' => 'task/edit/$1',
        'task/add' => 'task/add',
        'user/login' => 'user/login',
        'user/logout' => 'user/logout',
        '^p([0-9]+$)' => 'task/index/$1',
        '^$' => 'task/index',
    ];

    public function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        $uri = $this->getURI();
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $parameters = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($parameters) . 'Controller');
                $actionName = 'action' . ucfirst(array_shift($parameters));
                $controllerFile = ROOT . "/app/controllers/" . $controllerName . ".php";

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                    $controllerObj = new $controllerName;
                    $result = call_user_func_array(array($controllerObj, $actionName), $parameters);
                    if ($result != null) {
                        break;
                    }
                }
            }
        }
    }

}
