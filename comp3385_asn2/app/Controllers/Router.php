<?php
// Deborah Best
namespace app\Controllers;
use framework\AbstractRouter;

class Router extends AbstractRouter
{
  //route constructor
  public function __construct(string $root_dir='/')
  {
    //set default route
    if (empty($this->routes)) {
      self::$routes['/'] = 'Index';
    }
    $this->appRouteDir= $root_dir;
    $this->addRoute('/dashboard.php', 'Dashboard');
    $this->addRoute('/login.php', 'Login');
    $this->addRoute('/logout.php', 'Logout');
    $this->addRoute('/register.php', 'Register');

  }
  public function run(): void
  {
    //get url and method
    $url = $_SERVER['REQUEST_URI'] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'];

    //extract URI
    //check if uri is empty

    $uri = $this->extractURI($url);
    //echo $uri . '<br>';
    //check if route exists
    if (array_key_exists($uri, self::$routes)) {
      $controller =  self::$routes[$uri] . 'Controller';
      //$view = self::$routes[$uri] . 'View';
      new $controller($method);
      //new $view();
    } else {
      $this->notFound();
    }

  }


  //get action

  //create controller object

  //call action

  //if route doesn't exist, call notFound()

  // create route if it doesn't exist
  public function createRoute(string $route, string $controller): void
  {
    if (!array_key_exists($route, self::$routes)) {
      self::$routes[$route] = $controller;
    }
  }

  //response for route that doesn't exist
  public function notFound(): void
  {
    http_response_code(404);
    echo "404 Not Found";
    exit();
  }

}