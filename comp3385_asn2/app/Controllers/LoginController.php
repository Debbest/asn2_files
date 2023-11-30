<?php

use framework\ORM;
use framework\Validator;
use \app\Views\LoginView;
use \config\SessionHandler;

class LoginController
{

  private $email;
  private $pass;
  private $errors = [];

  private $user;


  public function __construct($method)
  {
    SessionHandler::deleteElement('errors');
    if(SessionHandler::checkLogin()){
      header('Location: dashboard.php');
    }
    if ($method === 'GET') {
      $this->get();
    } else if ($method === 'POST') {
      $this->post();
    }


  }

  public function get()
  {
    new LoginView();

  }

  public function post()
  {
    //require_once TPL_DIR . '/login.tpl.php';
    //echo "$_POST[0]: ";
    //check if login form has been submitted
    if (isset($_POST['login'])) {
      //echo 'Login form submitted <br>';
      //get login information from form
      $this->email = $_POST['email'];
      $this->pass = $_POST['password'];

      //var_dump ($_SESSION);
      // validate login information
      if ($this->validateLogin() === false) {
        //var_dump($this->errors);
        $_SESSION['errors'] = $this->errors;
        new LoginView();


      } else {
        //echo 'Login information is valid <br>';
        //authenticate login information
        //$this->authenticate();
        if ($this->authenticate() === false) {
          //collect login error

          $_SESSION['errors'] = $this->errors;
          new LoginView();


        } else {
          //set session user
          $_SESSION['user'] = $this->user;
          //echo 'Login Successful';
          //redirect dashboard
          header('Location: dashboard.php');
        }
        //var_dump($this->showErrors());
      }
    }
  }

  //validate login information
  public function validateLogin(): bool
  {
    $checker = new Validator();

    if ($checker->validEmail($this->email)) {
      return true;
    }
    else {
      //var_dump($checker->getErrorMessage());
      //gets errors from validator and adds them to errors array
      foreach ($checker->getErrorMessage() as $key => $value) {
        $this->errors[$key] = $value;
      }
      //var_dump($this->errors);
      return false;
    }
  }

  public function authenticate()
  {
    //authenticate login information in orm
    $auth = new ORM(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    $user = $auth->findUser('users', $this->email, $this->pass);
    if ($user === false) {
      $this->errors['login'] = 'Incorrect username or password';
      return false;
    } else {
      $this->user = $user;
      return $user;
    }
  }

  public function showErrors(){
    return $this->errors;

  }

}