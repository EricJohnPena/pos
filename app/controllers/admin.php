<?php
$tab = $_GET['tab'] ?? 'dashboard';

if($tab == "products"){
$productClass = new Products ();
$products = $productClass->query("select * from products order by id desc");
}
require viewsPath('admin/admin');