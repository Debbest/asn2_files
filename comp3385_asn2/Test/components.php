<?php

//use app\Controllers\Router;
include_once '../app/Controllers/Router.php';
include_once '../config/config.php';

echo WEB_DIR;

$egg = new Router();

$egg->run();
