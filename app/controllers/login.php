<?php

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {


  $arr['username'] = $_POST['username'];
$user = new User();
  if ($row = $user->where($arr)) {
  if(password_verify($_POST['password'],$row[0]['password'])){
    
      authenticate($row[0]);
      redirect('home');
    } else {
      $errors['password'] = 'Wrong password!!';
    }
  } else {
    $errors['username'] = 'Username not found.';
  }
}




require viewsPath('auth/login');
