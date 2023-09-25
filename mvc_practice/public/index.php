<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();
require_once dirname(__DIR__) . "/config/config.php";

require_once CORE . '/funcs.php';

// FRONT CONTROLLER

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Підключення файлів системи
use myfrm\DatabaseConnection;
require_once ROOT . '/app/components/Router.php';

// Підключення бази даних

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

// Створення екземпляру класа роут
$router = new Router();
$router->run($connect);
?>


