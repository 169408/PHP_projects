<?php

class Router
{
    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/app/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        // Отримати рядок запиту
        $uri = $this->getURI();

        // Перевірити наявність такого запиту у routes.php
        foreach ($this->routes as $uriPattern => $path) {

            // Порівнюємо $uriPattern і $uri
            if(preg_match("~$uriPattern~", $uri)) {

                // Якщо є збіг, то визначити який контроллер і action о опрацьовує запит
                $segments = explode('/', $path);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                // Підключити файл класу-контроллера

                $controllerFile = ROOT . '/app/controllers/' . $controllerName . '.php';
                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Створити об'єкт, викликати метод (тобто action)

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if($result != null) {
                    break;
                }


            }
        }
    }
}