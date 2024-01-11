<?php
require "../app/cores/init.php";
$controller = $_GET['pg'] ?? "home";//if exist, send 1, else send 2
$controller = strtolower($controller);

if (file_exists("../app/controllers/" . $controller . ".php")){
  require "../app/controllers/" . $controller . ".php"; //include the file with this name in pages folder
}else{
  echo "Controller not found";
};
