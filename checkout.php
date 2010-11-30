<?php 

#$require_https = TRUE;

include_once("config/initialize.php"); 
include_once("config/database.php"); 
include_once("config/functions.php"); 

$stylesheets[] = 'checkout.css';

$return_page = request_var($db, 'return_page');

$cart_id = cart_id($db); 
# Shipping Information
$variables = array('name', 'email', 'phone', 'address', 'address2', 'city', 'state', 'zip_code', 'shipping');
foreach ($variables as $variable) {
  $$variable = request_var($db, $variable);
}
$shipping_type = substr($shipping, 0,2);
$shipping = trim(str_replace("$shipping_type ", '', $shipping));
  if ($shipping_type == 'GR') {$shipping_type = 'Ground';}
  if ($shipping_type == 'TH') {$shipping_type = 'Third Day';}
  if ($shipping_type == 'SC') {$shipping_type = 'Second Day';}
  if ($shipping_type == 'ND') {$shipping_type = 'Next Day';}


# Billing Information
$variables = array('cc_name', 'cc_number', 'cc_code', 'cc_month', 'cc_year', 'cc_address', 'cc_address2', 'cc_city', 'cc_state', 'cc_zip_code', 'shipping_same_as_billing');
foreach ($variables as $variable) {
  $$variable = request_var($db, $variable);
}
  $replacements = array (' ', '(' , ')', '-');
  $cc_number = trim(str_replace($replacements, '', $cc_number));

# International
$variables = array('int_address', 'cc_int_address');
foreach ($variables as $variable) {
  $$variable = request_var($db, $variable);
}
  $replacements = array ('\r\n');
  $cc_int_address = str_replace($replacements, '&#10;', $int_address);


if (action() == 'verify_int_billing_info') {
  include("checkout/verify_int_billing_info.php");
}

if (action() == 'int_billing_info') {
  include("checkout/int_billing_info.php");
}

if (action() == 'verify_int_shipping_info') {
  include("checkout/verify_int_shipping_info.php");
}

if (action() == 'int_shipping_info') {
  include("checkout/int_shipping_info.php");
}

if (action() == 'int_finalize_order') {
  include("checkout/int_finalize_order.php");
}

if (action() == 'verify_billing_info') {
  include("checkout/_verify_billing_info.php");
}

if (action() == 'billing_info') {
  include("checkout/_billing_info.php");
}

if (action() == 'verify_shipping_info') {
  include("checkout/_verify_shipping_info.php");
}

if (action() == 'shipping_info') {
  include("checkout/_shipping_info.php");
}

if (action() == 'finalize_order') {
  include("checkout/_finalize_order.php");
}

if (action() == 'submit_order') {
  include("checkout/_submit_order.php");
}

if (action() == 'order_summary') {
  include("checkout/_order_summary.php");
}

if (action() == 'thank_you') {
  include("checkout/_thank_you.php");
}

if (action() == 'mailing_list_yes') {
  include("checkout/_mailing_list_yes.php");
}

if (action() == 'mailing_list_no') {
  include("checkout/_mailing_list_no.php");
}

if (action() == 'none') {
    header('Location: index.php');; }
  
  
?>