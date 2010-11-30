<?php
  
  if (empty($name) || empty($address) || empty($city) || empty($state) || empty($zip_code)) {
    $_SESSION['flash'][] = "Please complete all fields";
    $_REQUEST['action'] = 'shipping_info';
    # Verification State  
  } elseif (!is_numeric($zip_code) || strlen($zip_code) != 5) {
    $_SESSION['flash'][] = "Invalid zip code";
    $_REQUEST['action'] = 'shipping_info';
  } else {
    $db->query("UPDATE cart SET shipping_type='$shipping_type', shipping='$shipping', name='$name', address='$address', address2='$address2', city='$city', state='$state', zip_code='$zip_code' WHERE id='$cart_id'"); 
    if ($db->error) {
      $_SESSION['flash'][] = "Could not save shipping information: " . $db->error ;
      $_REQUEST['action'] = 'shipping_info';
    } else {
      $_SESSION['flash'][] = "Shipping Information Saved";
      $_REQUEST['action'] = 'finalize_order';
    }
  }
 
?>





