<?php

class User extends Model{
  protected $table = 'users';
  protected $allowed_columns = [
      'username',
      'email',
      'password',
      'role',
      'image',
      'date',
    ];

  

public function validate($data)
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

    //check password
    if (empty($data['password'])) {
      $errors['password'] = 'Password is required.';
    } else if ($data['password'] !== $data['repassword']) {
      $errors['repassword'] = 'Passwords do not match. Please try again.';
    } else if (strlen($data['password']) < 8) {
      $errors['password'] = 'Your password must be at least 8 characters long.';
    }
  

  return $errors;
}


}