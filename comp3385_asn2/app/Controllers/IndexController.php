<?php

use \config\SessionHandler;
class IndexController
{
  public function __construct($method)
  {
    if(SessionHandler::checkLogin()){
      header('Location: dashboard.php');
    }
    require_once TPL_DIR . '/index.tpl.php';
   // echo $method . ' method called from IndexController <br>';
    //echo 'It Worked!';
  }

}