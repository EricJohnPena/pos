<?php

$errors = [];
$id = $_GET['id'] ?? Auth::get('id');
$user = new User();
 $row = $user->where_one(['id'=>$id]);

 if(!empty($_SERVER['HTTP_REFERER'])){
  $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
  
  }

if ($_SERVER['REQUEST_METHOD'] == "POST"){


  if($_POST['role'] == "admin"){
    if(!Auth::get('role') == "admin"){
      $_POST['role'] = "user";
    }
  }
  
 
$errors = $user->validate($_POST, $id);
if(empty($errors)){
  if(empty($_POST['password'])){
    unset($_POST['password']);
  }else{
  $_POST['password'] = password_hash($_POST['password'],  PASSWORD_BCRYPT);
 
} $user->update($id,$_POST);
  redirect('admin&tab=users');
}
}
if(Auth::access('admin') || ($row && $row['id'] == Auth::get('id')) ){
 require viewsPath('auth/profile');
}else{
  Auth::setMessage("You don't have access to this page.");
  require viewsPath('auth/denied');
}
