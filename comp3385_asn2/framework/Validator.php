<?php
// Deborah Best
namespace framework;

class Validator{

  private array $error_message;


  public function __construct(){
    //initialize array
    $this->error_message = array();

  }

//checks username format
  public function validUsername($username){

  echo "valid user <br>";
    if(strlen($username) < 1) {
      $this->error_message['username-error'] = "Username field is empty";
      return false;
    }
    elseif (strlen($username) > 5) {
      $this->error_message['username-error'] = "Username must be at least 5 characters long";
      return false;
    }
    else{
      return true;
    }

  }

  public function validEmail($email) {
      echo "valid email <br>";
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }
    else {
      $this->error_message['email-error'] = 'Invalid email format';
      return false;
    }
  }


//Compare emails addresses on the registration page

  public function confirmEmail($email, $confirmed) {

    echo "confirm email <br>";
    if($email === $confirmed){
      return true;
    }
    else {
      $this->error_message['email-confirmation'] = 'Emails do not match';
      return false;
    }

  }

  public function validPassword($password){
    echo "valid pass <br>";

    if (strlen($password) < 1) {
      //Check for a blank password
      $this->error_message['pass-empty'] = "Password field is empty";
      return false;

    } elseif (strlen($password) < 10) {
      //Check for a short password
      $this->error_message['pass-length'] = "Password must be at least 10 characters long";
      return false;

    } elseif (!preg_match("/[A-Z]/", $password)
     || !preg_match("/[a-z]/", $password)
      || !preg_match("/[0-9]/", $password)
      ||!preg_match("/[^A-Za-z0-9]/", $password)) {

      //Check if the password has all letters
      $this->error_message['pass-complex'] = "Password complexity not met";
      return false;
    } else {
      return true;

    }
  }


//Compare passwords on registration page and stores error if not the same
  public function confirmPass($password, $confirmed){
    echo "confirm pass <br>";
    if ($password == $confirmed){
      return true;
    }
    else{
      $this->error_message['password-confirm'] = 'Passwords do not match';
      return false;
    }
  }

  public function isValidReg($user, $email, $confEmail, $pass, $confPass) {
    //checks form data
    if ($this->validUsername($user)
      && $this->validEmail($email) && $this->confirmEmail($email,$confEmail)
      && $this->validPassword($pass))
    {
      if ($this->confirmPass($pass, $confPass)){
        return true;
      }
      else{
        return false;
      }

    }
    else
    {
      return false;
    }

  }



//checks validation for login
  public function isValidLogin($email, $pass) {
    if ($this->validEmail($email) && $this->validPassword($pass)) {
      return true;
    }
    else {
      return false;
    }

  }

//check validation for new user page
  public function isValidNewUser($user, $email,$pass){
    if ($this->validUsername($user)
      && $this->validPassword($pass) && $this->validEmail($email))
    {
      return true;
    }
    else {
      return false;

    }
  }
  //returns error message array
  public function getErrorMessage(): array
  {
    return $this->error_message;
  }

  public function getErrors(): string{
    //stores errors in a string
    $errorString = '';
    foreach ($this->error_message as $key => $mess){
      $errorString .= $mess . '<br>';
    }
    return $errorString;
  }
}