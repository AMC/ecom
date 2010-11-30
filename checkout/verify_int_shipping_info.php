<?php
  
  if (empty($name) || empty($email) || empty($phone) || empty($int_address)) {
    $_SESSION['flash'][] = "Please complete all fields";
    $_REQUEST['action'] = 'int_shipping_info';
  } elseif (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
    $_SESSION['flash'][] = "Invalid email address";
    $_REQUEST['action'] = 'int_shipping_info';
    # Verification Phone
    # Verification State  
  } else {
    $order_total;
    $db->query("UPDATE cart SET shipping='$shipping', name='$name', email='$email', phone='$phone', int_address='$int_address' WHERE id='$cart_id'"); 
    if ($db->error) {
      $_SESSION['flash'][] = "Could not save shipping information: " . $db->error ;
      $_REQUEST['action'] = 'int_shipping_info';
    } else {
      $_SESSION['flash'][] = "Shipping Information Saved";
      $_SESSION['international'] = true;
      $_REQUEST['action'] = 'finalize_order';
    }
  }
 
?>





