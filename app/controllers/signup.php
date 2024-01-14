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
  redirect('login');
}else{

}
  
  
}

require viewsPath('auth/signup');