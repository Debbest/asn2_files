<?php


namespace framework;
abstract class AbstractRouter implements RouterInterface
{
  //router array
  protected static $routes = [];

  // app route directory set in config.php
  protected $appRouteDir = "../app/Controllers/";


  //extract URI
 public function extractURI(string $url): string {

    $urlArray = parse_url($url);
    $paths = explode('/', $urlArray['path']);

    return '/'.$paths[count($paths) - 1];
 }
  //add routes
  public function addRoute(string $route, string $controller): void
  {
    self::$routes[$route] = $controller;
  }


  //delete routes
  public function deleteRoute(string $route): void
  {
    unset(self::$routes[$route]);
  }

  //message for route that doesn't exist
  abstract public function notFound(): void;

}