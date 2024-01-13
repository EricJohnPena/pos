<?php

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $_POST['role'] = 'cashier';
  $_POST['date'] = date("Y-m-d H:i:s");

$errors = validate($_POST, 'users');
if(empty($errors)){
  $_POST['password'] = password_hash($_POST['password'],  PASSWORD_BCRYPT);
  insert($_POST, 'users');
  redirect('login');
}else{

}
  
  
}

require viewsPath('auth/signup');