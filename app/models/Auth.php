<?php

class Auth
{
  public static function get($column)
  {
    if (!empty($_SESSION['USER'][$column])) {
      return $_SESSION['USER'][$column];
    }
    return 'Unknown';
  }

  public static function loggedIn()
  {
    if (!empty($_SESSION['USER'])) {
      $db = new Database();

      if ($check = $db->query("select * from users where id = :id", ['id' => $_SESSION['USER']['id']])) {
        return true;
      }
    } else {
      return false;
    }
  }

  public static function access($role)
  {
    $access['admin'] = ['admin'];
    $access['cashier'] = ['admin', 'cashier'];

    $myrole = self::get('role');
    if (in_array($myrole, $access[$role])) {
      return true;
    }
    return false;
  }

  public static function getMessage()
  {
    if (!empty($_SESSION['MESSAGE'])) {
      $message = $_SESSION['MESSAGE'];
      unset($_SESSION['MESSAGE']);
      return $message;
    }
  }
  public static function setMessage($message)
  {
    $_SESSION['MESSAGE'] = $message;
  }
}
