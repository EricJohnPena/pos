<?php

$errors = [];
$id = $_GET['id'] ?? null;
$sale = new Sale();

$row = $sale->where_one(['id'=>$id]);
if ($_SERVER['REQUEST_METHOD'] == "POST" && $row){

 
 $sale->delete($row['id']);

if(file_exists($row['image'])){
  unlink($row['image']);
}

 
  redirect('admin&tab=sales');
}
  


require viewsPath('sales/sale-delete');