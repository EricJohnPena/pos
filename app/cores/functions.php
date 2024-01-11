<?php

function show($data){
  echo '<pre>';
print_r($data);
echo '</pre>';
}

function viewsPath($view){

  if(file_exists("../app/views/$view.view.php")){
    return "../app/views/$view.view.php";
  }else{
    echo "view '$view' does not exist";
  };
 
};