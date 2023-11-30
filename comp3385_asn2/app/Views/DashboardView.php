<?php
// Deborah Best
namespace  app\Views;

class DashboardView
{
  public function __construct()
  {
    require_once TPL_DIR . '/dashboard.tpl.php';
  }
}