<?php

require_once dirname(__DIR__) . "/config/config.php";

require_once CORE . '/funcs.php';

// FRONT CONTROLLER

ini_set('display_errors', 1);
error_reporting(E_ALL);

//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//$uri = str_replace('mvc_practice', '', $uri);
//$uri = trim($uri, '/');
//
//
//if($uri === '' or $uri == 'news/view') {
//    require_once VIEWS . '/news/view.php';
//} elseif ($uri == 'news/create') {
//    require_once VIEWS . '/news/create.php';
//} else {
//    abort(404);
//}

// Підключення файлів системи
require_once CONFIG . '/database/DatabaseConnection.php';
require_once ROOT . '/app/components/Router.php';

// Підключення бази даних

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

// Створення екземпляру класа роут

$router = new Router();
$router->run($connect);
?>


