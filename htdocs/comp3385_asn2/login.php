<?php

require_once 'autoloader.php';
use app\controllers\Router;
use config\SessionHandler;
use app\Views\LoginView;
use framework\FormGenerator;

//start session if not already started
SessionHandler::checkSession();

//$page = new LoginView();
$router = new Router();

$router->run();