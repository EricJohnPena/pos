<?php

$errors = [];
$id = $_GET['id'] ?? Auth::get('id');
$user = new User();
 $row = $user->where_one(['id'=>$id]);
if ($_SERVER['REQUEST_METHOD'] == "POST"){


 
    if((Auth::access('admin') || ($row && $row['id'] == Auth::get('id')))){

      $user->delete($row['id']);
      if(file_exists($row['image'])){
        unlink($row['image']);
      }
      if(Auth::access('admin')){
        redirect('admin&tab=users');
      }else{
        redirect('login');
      }
    }

}
if(Auth::access('admin') || ($row && $row['id'] == Auth::get('id')) ){
 require viewsPath('auth/user-delete');
}else{
  Auth::setMessage("You don't have access to this page.");
  require viewsPath('auth/denied');
}
