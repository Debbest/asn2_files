<?php
// Deborah Best
namespace config;
class SessionHandler
{
  public function __construct()
  {
    //check if session is already started
    self::checkSession();

  }

  public static function setSession(string $key, $value): void
  {
    //check if session is already started
    self::checkSession();
    //check for session key
    if (!isset($_SESSION[$key])) {
      $_SESSION[$key] = $value;
    }
  }

  public static function checkLogin()
  {
    if (isset($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }

  }

  public static function updateSession(string $key, $value): void
  {
    //check if session is already started
    self::checkSession();
    //check for session key
    if (isset($_SESSION[$key])) {
      $_SESSION[$key] = $value;
    }
  }


  public static function getSession(string $key)
  {
    //checks if session is already started
    self::checkSession();
    //check for session key
    if (!isset($_SESSION[$key])) {
      return null;
    }
    return $_SESSION[$key];
  }

  public static function deleteElement(string $key): void
  {
    //checks if session is already started
    self::checkSession();
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }

  public static function destroySession(): void
  {
    //checks if session is already started
    if(session_status() == PHP_SESSION_NONE) {
      return;
    }
    session_destroy();
  }



  public static function checkSession() {
    //checks if session is already started
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

  }

}