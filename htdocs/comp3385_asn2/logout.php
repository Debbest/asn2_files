<?php
require_once 'autoloader.php';
use app\controllers\Router;
use config\SessionHandler;

SessionHandler::checkSession();

$router = new Router();

$router->run();