<?php

define("ROOT", dirname(__DIR__));
define("PUB", ROOT . '/public');
define("CORE", ROOT . '/core');
define("APP", ROOT . '/app');
define("CONTROLLERS", APP . '/controllers');
define("VIEWS", APP . '/views');
define("PATH", 'http://fuckyou/mvc_practice');

require_once CORE . '/funcs.php';

// FRONT CONTROLLER

ini_set('display_errors', 1);
error_reporting(E_ALL);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = str_replace('mvc_practice', '', $uri);
$uri = trim($uri, '/');


if($uri === '' or $uri == 'news/view') {
    require_once VIEWS . '/news/view.php';
} elseif ($uri == 'news/create') {
    require_once VIEWS . '/news/create.php';
} else {
    abort(404);
}

// Підключення файлів системи
//require_once ROOT . '/app/components/Router.php';

// Створення екземпляру класа роут

//$router = new Router();
//$router->run();
?>


