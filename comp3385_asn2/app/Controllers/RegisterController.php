<?php

use framework\ORM;
use framework\Validator;
use \app\Views\RegisterView;
use \config\SessionHandler;
class RegisterController
{
  private $formData = [];

  public function __construct($method)
  {
    //echo $method . ' method called from Controller <br>';

    if ($method === 'GET') {
      $this->get();
    } else if ($method === 'POST') {
      $this->post();
    }
    //echo 'It Worked!';
  }

  public function get()
  {
    new RegisterView();

  }

  public function post()
  {
    //require_once TPL_DIR . '/login.tpl.php';
    //echo "$_POST[0]: ";
    //check if login form has been submitted
    if (isset($_POST['register'])) {

      foreach ($_POST as $key => $value) {
        $this->formData[$key] = $value;
      }
      // validate login information
      if ($this->validateRegister() === false) {
        //var_dump($this->errors);
        $_SESSION['errors'] = $this->errors;
        new RegisterView();
      }
    }
  }

  public function validateRegister()
  {
    $user = $this->formData['username'];
    $email = $this->formData['email'];
    $email2 = $this->formData['email2'];
    $pass = $this->formData['password'];
    $pass2 = $this->formData['password2'];

    $checker = new Validator();
    $checker->isValidReg($user, $email, $email2, $pass, $pass2);


  }
}