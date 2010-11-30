<?php

  if (empty($cc_name) || empty($cc_number) || empty($cc_code) || empty($cc_month) || empty($cc_year) || empty($cc_int_address)) {
    $_SESSION['flash'][] = "Please complete all fields";
    $_REQUEST['action'] = 'int_billing_info';
  } elseif (!preg_match("/^([4]{1})([0-9]{12,15})$/", $cc_number) && !preg_match("/^5[1-5][0-9]{14}$/", $cc_number) && !preg_match("/^3[47][0-9]{13}$/", $cc_number) && !preg_match("/^6(?:011|5[0-9]{2})[0-9]{12}$/", $cc_number)) {
    $_SESSION['flash'][] = "Invalid credit card number";
    $_REQUEST['action'] = 'int_billing_info';
  } elseif (strlen($cc_code) != '3') {
    $_SESSION['flash'][] = "Invalid security code";
    $_REQUEST['action'] = 'int_billing_info';
  } elseif ($cc_year == date('Y') && $cc_month < date('n') ){
    $_SESSION['flash'][] = "Credit card expired";
    $_REQUEST['action'] = 'int_billing_info';  
  } else {
    if (preg_match("/^([4]{1})([0-9]{12,15})$/", $cc_number)) { 
      $cc_type = "visa"; 
    } elseif (preg_match("/^5[1-5][0-9]{14}$/", $cc_number)) { 
      $cc_type = "mastercard"; 
    } elseif (preg_match("/3[47][0-9]{13}$/", $cc_number)) {
      $cc_type="american express";
    } elseif (preg_match("/^6(?:011|5[0-9]{2})[0-9]{12}$/", $cc_number)) {
      $cc_type = "discover";
    }
    
    $db->query("UPDATE cart SET cc_name='$cc_name', cc_type='$cc_type', cc_number='$cc_number', cc_code='$cc_code', cc_expiration='$cc_month / $cc_year', cc_int_address='$cc_int_address' WHERE id='$cart_id'");
    if ($db->error) {
      $_SESSION['flash'][] = "Could not save billing information: " . $db->error ;
      $_REQUEST['action'] = 'int_billing_info';
    } else {
      $_SESSION['flash'][] = "Billing Information Saved";
      if ($shipping_same_as_billing == 'true') {
        $variables = array('cc_name' => 'name', 'cc_int_address' => 'int_address');
        foreach ($variables as $billing => $shipping) {
          $$shipping = $$billing;
        }
        
      }
      
      $_REQUEST['action'] = 'int_shipping_info';
    }
  }

?>





