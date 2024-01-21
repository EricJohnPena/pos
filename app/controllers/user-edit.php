<?php

$errors = [];
$id = $_GET['id'] ?? null;
$user = new User();
 $row = $user->where_one(['id'=>$id]);

if(!empty($_SERVER['HTTP_REFERER']) && !strstr($_SERVER['HTTP_REFERER'],"edit-user")){
$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

}


if ($_SERVER['REQUEST_METHOD'] == "POST"){


  if($_POST['role'] != $row['role']){
    if(Auth::get('role') != "admin"){
      $_POST['role'] = $row['role'];
    }
  }

  if(!empty($_FILES['image']['name'])){
    $_POST['image'] = $_FILES['image'];
   
  }
  
 
$errors = $user->validate($_POST, $id);
if(empty($errors)){
  if(empty($_POST['password'])){
    unset($_POST['password']);
  }else{
  $_POST['password'] = password_hash($_POST['password'],  PASSWORD_BCRYPT);

 
} 

$folder = "uploads/user/";
if(!file_exists($folder)){
  mkdir($folder,0777,true);
}

if(!empty($_POST['image'])){
$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION ));
$destination = $folder . $user->generate_filename($ext);
move_uploaded_file( $_POST['image']['tmp_name'], $destination); 
$_POST['image'] = $destination;

if(file_exists($row['image'])){
  unlink($row['image']);
}
}


$user->update($id,$_POST);
if(Auth::access('admin')){
  redirect('admin&tab=users');
}else{
  redirect('home');
}
}
}
if(Auth::access('admin') || ($row && $row['id'] == Auth::get('id')) ){
 require viewsPath('auth/user-edit');
}else{
  Auth::setMessage("You don't have access to this page.");
  require viewsPath('auth/denied');
}
