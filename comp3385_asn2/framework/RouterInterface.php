<?php

namespace framework;
//router interface
interface RouterInterface
{
  //add routes
  public function addRoute(string $route, string $controller);

  //extract URI
  public function extractURI(string $uri): string;

  //run the router


  //delete routes
  public function deleteRoute(string $route): void;
}