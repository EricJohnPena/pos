<?php
defined("ABSPATH") ? "" :die();

if(Auth::access('cashier')){
  require viewsPath('home');
}else{
 
  redirect('login');
}

