<?php
require_once 'autoloader.php';
use app\controllers\Router;
use config\SessionHandler;

$mySession = new SessionHandler();

$router = new Router();

$router->run();