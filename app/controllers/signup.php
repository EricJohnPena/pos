<?php

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$user = new User();

  $_POST['role'] = 'cashier';
  $_POST['date'] = date("Y-m-d H:i:s");

$errors = $user->validate($_POST);
if(empty($errors)){
  $_POST['password'] = password_hash($_POST['password'],  PASSWORD_BCRYPT);
  $user->insert($_POST);
  redirect('admin&tab=users');
}else{

}
}
if(Auth::access('admin')){
 require viewsPath('auth/signup');
}else{
  Auth::setMessage("You don't have access to this page.");
  require viewsPath('auth/denied');
}
