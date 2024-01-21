<?php

$errors = [];
$id = $_GET['id'] ?? null;
$sale = new Sale();

$row = $sale->where_one(['id'=>$id]);
if ($_SERVER['REQUEST_METHOD'] == "POST" && $row){


$errors = $sale->validate($_POST,$row['id']);
if(empty($errors)){


  $_POST['total'] = $_POST['quantity'] * $_POST['amount'];
  $sale->update($row['id'],$_POST);
  redirect('admin&tab=sales');
}
  
}

require viewsPath('sales/sale-edit');