<?php
require "../app/cores/config.php";
require "../app/cores/functions.php";
require "../app/cores/database.php";
require "../app/cores/model.php";

spl_autoload_register('my_function');

function my_function($classname){
  $filename = "../app/models/".ucfirst($classname) . ".php";
if(file_exists($filename)){
  require $filename;
}
}
