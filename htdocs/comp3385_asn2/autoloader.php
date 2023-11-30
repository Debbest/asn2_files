<?php

//require config file

require_once ('c:/xampp/comp3385_asn2/config/config.php');
//autoload for classes in app

spl_autoload_register('autoloader');


function autoloader($class) {
 //echo $class . '5<br>';
  $filename  = DIRECTORY_SEPARATOR. $class . '.php';

  //echo CONTROLLER_DIR . $filename . '<br>';
  if (file_exists(ROOT_DIR . $filename)) {
    require_once ROOT_DIR . $filename;
  } else if (file_exists(CONTROLLER_DIR . $filename)) {

    require_once CONTROLLER_DIR . $filename;
  }
  //  else if (file_exists(FRAMEWORK_DIR .'/../'. $filename)) {
//    //require_once FRAMEWORK_DIR . $filename;
//
    else if (file_exists(VIEW_DIR . $filename)) {
   require_once VIEW_DIR . $filename;
  }  //else if (file_exists(CONFIG_DIR . $filename)) {
//    require_once CONFIG_DIR . $filename;
//  } else if (file_exists(TPL_DIR . $filename)) {
//    require_once TPL_DIR . $filename;
//  }

  else {

    //put error handling here later
    echo 'Class not found';
  }
}