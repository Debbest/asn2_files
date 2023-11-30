<?php
use \app\Views\DashboardView;
use \config\SessionHandler;
class DashboardController
{
  public function __construct($method)
  {
    if(!SessionHandler::checkLogin()){
      header('Location: ./');
    }
    if ($method == 'GET'){

      new DashboardView();
    }


  }


}