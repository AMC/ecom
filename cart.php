<?php 

include_once("config/initialize.php"); 
include_once("config/database.php"); 
include_once("config/functions.php"); 

$stylesheets[] = 'cart.css';
$stylesheets[] = 'categories.css';

$form_variables = array('return_page', 'product_id', 'quantity', 'price', 'free_shipping', 'promo_code');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}
$product = product($db, $product_id);
$cart_id = cart_id($db);


if (isset($_REQUEST['options']) && is_array($_REQUEST['options'])) {    

  $options = implode(",", $_REQUEST['options']);
  $options = trim($options); 
  $options = $db->real_escape_string($options);
} elseif ( isset($_REQUEST['options']) ) {
  $options = request_var($db, 'options');
} else {
  $options = '';
}

if (action() == 'discount_add') {
  include("cart/discount_add.php");
}

if (action() == 'add_product') { 
  include("cart/add_product.php"); } 

if (action() == 'delete_product') { 
  include("cart/delete_product.php"); }
  
if (action() == 'empty_cart') { 
  include("cart/empty_cart.php"); }

if (action() == 'update_cart') { 
  include("cart/update_cart.php"); }

if (action() == 'none' || action() == 'index' || action() == "") {
  include("cart/index.php"); }
  
  
?>