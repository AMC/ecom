<?php 

include_once("config/initialize.php"); 

$stylesheets = array('admin.css', 'calendar.css'); // Overwrite layout.css
$javascripts[] = 'calendar.js';

include_once("config/database.php"); 
include_once("config/functions.php"); 

//print_r($_REQUEST);


#Set variables
$form_variables = array('cart_id', 'product_id', 'order_status', 'old_status', 'name', 'email', 'phone', 'address', 'address2', 'city', 'state', 'zip_code', 'notes', 'tax', 'shipping', 'discount', 'total');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

#Parial Order Variables
$form_variables = array('shipped');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}


# Search variables
$form_variables = array('order_id', 'date_low', 'date_high', 'customer_name', 'order_status', 'amt_low', 'amt_high');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

# shipping variables
$form_variables = array('shipping_id', 'max_amt', 'prev_max', 'ground', 'third_day', 'second_day', 'next_day');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

# promotion variables
$form_variables = array('promo_id', 'promo_name', 'promo_code', 'promo_message', 'promo_start', 'promo_end', 'promo_min', 'promo_percent', 'promo_amount', 'promo_storewide', 'promo_type', 'promo_item', 'promo_item_id' );
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

if ($promo_storewide == 'on') {
  $promo_storewide = TRUE;
}

# Note variables
$form_variables = array('note_name', 'note', 'return_url');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

# Category variables
$form_variables = array('view');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

# Pages Variables
$form_variables = array('page_id', 'page_name', 'page_image', 'page_description');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}

# UPS Varialbes
$form_variables = array('ups_invoice', 'ups_name', 'ups_phone', 'ups_address', 'ups_address2', 'ups_city', 'ups_state', 'ups_zip', 'ups_service', 'package_length', 'package_width', 'package_height', 'package_weight', 'package_value');
foreach ($form_variables as $var) {
  $$var = request_var($db, $var);
}




if (role() != 'admin') {
  $_SESSION['flash'][] = 'You are not authorized to view that area.';
  header("Location: index.php");
}


if (action() == 'ups_create') {
  include('admin/ups_create.php');
}

if (action() == 'ups_new') {
  include('admin/ups_new.php');
}


if (action() == 'update_note') {
  include("admin/update_note.php");
}

if (action() == 'invoice') {
  include("admin/_admin_invoice.php");
}

if (action() == 'shipping') {
  include("admin/_admin_shipping.php");
}

if (action() == 'vendor') {
  include("admin/_admin_vendor.php");
}

if (action() == 'partial_order_update') {
  include('admin/partial_order_update.php');
}

if (action() == 'order_update_shipping') {
  include("admin/_admin_order_update_shipping.php");
}

if (action() == 'order_update_costs') {
  include("admin/_admin_order_update_costs.php");
}

if (action() == 'order_details') {
  include("admin/_admin_order_details.php");
}

if (action() == 'display_file') {
  include("admin/_upload_display.php");
}

if (action() == 'process_file') {
  include("admin/_upload_process.php");
}

if (action() == 'delete_file') {
  include("admin/_upload_delete.php");
}

if (action() == 'upload_file') {
  include("admin/_upload_file.php");
}

if (action() == 'update_shipping_tier') {
  include("admin/_shipping_table_update.php");
}

if (action() == 'shipping_view_products') {
  include("admin/_shipping_view_products.php");
}

if (action() == 'shipping_table') {
  include("admin/_shipping_table.php");
}

if (action() == 'process_products') {
  include("admin/_admin_products_process.php");
}

if (action() == 'new_promotion') {
  include("admin/promotion_new.php");
}


if (action() == 'add_promo_item') {
  include("admin/promo_item_add.php"); 
}

if (action() == 'delete_promo_item') {

  include('admin/promo_item_delete.php');
}

if (action() == 'update_promotion') {
  include("admin/promotion_update.php");
}

if (action() == 'edit_promotion') {
  include("admin/promotion_edit.php");
}

if (action() == 'delete_promotion') {
  include('admin/promotion_delete.php');
}


if (action() == 'promotions') {
  include("admin/promotions_index.php");
}

if (action() == "update_categories") {
  include("admin/update_categories.php");
}

if (action() == 'category_contents') {
  include('admin/category_contents.php');
}

if (action() == 'update_category_image') {
  include('admin/categories_update.php');
}

if (action() == 'categories') {
  include('admin/categories.php');
}

if (action() == 'none') {
  include("admin/_admin_dashboard.php");
}

if (action() == 'calendar') {
  include("admin/calendar.php");
}


if (action() == 'update_page') {
  include('admin/pages_update.php');
}

if (action() == 'edit_page') {
  include('admin/pages_edit.php');
}

if (action() == 'pages') {
  include("admin/pages.php");
}


  
?>