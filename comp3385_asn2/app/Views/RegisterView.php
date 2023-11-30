<?php
namespace app\Views;

class RegisterView
{
  public function __construct()
  {
    require_once TPL_DIR . '/register.tpl.php';
  }
}