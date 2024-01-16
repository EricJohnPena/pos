<?php

defined("ABSPATH") ? "" :die();

$productClass = new Products();

$rows = $productClass->getAll();


echo json_encode($rows);