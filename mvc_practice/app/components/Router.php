<?php

class Router
{
    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run($connect) {
        // Отримати рядок запиту
        $uri = $this->getURI();;

        // Перевірити наявність такого запиту у routes.php
        foreach ($this->routes as $uriPattern => $path) {
            $segments_uri = explode('/', $uri);
            $count_segment = 0;
            for($i = 0; $i < count($segments_uri); $i++) {
                if($segments_uri[$i] == $uriPattern) {
                    $count_segment = $i;
                }
            }
            // Порівнюємо $uriPattern і $uri
            if(preg_match("~$uriPattern~", $uri)) {
                foreach ($path as $value) {
                    if(preg_match("~/$value~", "$uri")) {
                        if(stristr($uri, "/$value") == "/$value") {
                            $road = $value;
                        }
                        break;
                    }
                }
                if($count_segment == count($segments_uri)-1) {
                    $road = $path[0];
                }
                if(!isset($road)) {
                    abort(404);
                }
                // Якщо є збіг, то визначити який контроллер і action о опрацьовує запит
                $segments = explode('/', $road);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                // Підключити файл класу-контроллера

                $controllerFile = ROOT . '/app/controllers/' . $controllerName . '.php';
                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Створити об'єкт, викликати метод (тобто action)

                $controllerObject = new $controllerName($connect);
                if($segments != null) {
                    $parameter = array_shift($segments);
                    $result = $controllerObject->$actionName($parameter);
                } else {
                    $result = $controllerObject->$actionName();
                }
                if($result != null) {
                    break;
                }


            }
        }
        if(!isset($result)) {
            require_once PUB . "/homepage.php";
        }
    }
}