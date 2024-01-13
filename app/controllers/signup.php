<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$errors = [];
  $_POST['role'] = 'cashier';
  $_POST['date'] = date("Y-m-d H:i:s");

$errors = validate($_POST, 'users');
if(empty($errors)){
  insert($_POST, 'users');
  redirect('login');
}else{

}
  
  
}

require viewsPath('auth/signup');