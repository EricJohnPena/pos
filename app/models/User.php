<?php

class User extends Model
{
  protected $table = 'users';
  protected $allowed_columns = [
    'username',
    'email',
    'password',
    'role',
    'image',
    'date',
  ];



  public function validate($data, $id = null)
  {
    $errors = [];


    //check username
    if (empty($data['username'])) {
      $errors['username'] = 'Username is required.';
    }

    //check username
    if (empty($data['email'])) {
      $errors['email'] = 'Email is required.';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Invalid Email';
    }

    if (!$id) {
      //check password
      if (empty($data['password'])) {
        $errors['password'] = 'Password is required.';
      } else if ($data['password'] !== $data['repassword']) {
        $errors['repassword'] = 'Passwords do not match. Please try again.';
      } else if (strlen($data['password']) < 8) {
        $errors['password'] = 'Your password must be at least 8 characters long.';
      }
    } else {
      //check password
      if (!empty($data['password'])) {
        if (strlen($data['password']) < 8) {
          $errors['password'] = 'Your password must be at least 8 characters long.';
        } else if ($data['password'] !== $data['repassword']) {
          $errors['repassword'] = 'Passwords do not match. Please try again.';
        }
      }
    }


    return $errors;
  }

  public function generate_filename($ext = "jpg"){

    return hash("sha1", rand(1000, 999999999))."_".rand(1000,9999).".".$ext;
  }

}
