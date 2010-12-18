<?php

include_once("config/initialize.php"); 
include_once("config/database.php"); 
include_once("config/functions.php");

$curl = $_SERVER['PHP_SELF'];

// print_r($_REQUEST);

$stylesheets[] = 'catalog.css';

#Set variables
$form_variables = array('type', 'view', 'offset', 'product_id', 'name', 'quantity', 'weight', 'manufacturer', 'reference', 'upc', 'category', 'price', 'cost', 'discontinued', 'description');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

$selection = str_replace("'", "&#39;", $view);
$selection = str_replace("\\", "", $selection);
$selection = str_replace("_", " ", $selection);
$selection = strtolower($selection);
$selection = ucwords($selection);

$form_variables = array('expand', 'view');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

$form_variables = array('option_name', 'option', 'price_impact', 'option_id');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

$form_variables = array('image');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

if (empty($offset)) {
  $offset = 0;
}

$offset_increment = 9;
$offset_next = $offset + $offset_increment;
$offset_prev = $offset - $offset_increment;
  
if (action() == 'update_image') {
  include('catalog/update_image.php');
}

if (action() == 'delete_image') {
  include('catalog/delete_image.php');
}

if (action() == 'new_option') {
  include('catalog/new_option.php');
}

if (action() == 'update_option') {
  include('catalog/update_option.php');
}

if (action() == 'delete_option') {
  include('catalog/delete_option.php');
}
  
if (action() == 'none' || action() == 'index') { 
  include("catalog/index.php"); 
  $_REQUEST['action'] = "FALSE"; 
  }

if (action() == 'create_product') {
  include("catalog/create_product.php");
}

if (action() == 'new_product') {
  include("catalog/view_product.php"); 
}


if (action() == 'update_product') { 
  include("catalog/update_product.php"); 
}
  
if (action() == 'view_product') { 
  include("catalog/view_product.php"); 
}


    
?>
