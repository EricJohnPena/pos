<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=APP_NAME?></title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet"  type="text/css" href="assets/css/all.min.css">
  <link rel="stylesheet"  type="text/css" href="assets/css/styles.css">
</head>
<body>
<?php
$no_nav[] = "login";
if(!in_array($controller, $no_nav)):
require viewsPath('partials/nav');
endif;


?>

<div class="container-fluid">