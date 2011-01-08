<?php
  
  if ($quantity > 1 ) {

    $db->query("UPDATE cart_products SET quantity='$quantity' WHERE cart_id='$cart_id' AND product_id='$product_id' AND options='$options'");

    if ($db->affected_rows > 0) {
      $_SESSION['flash'][] = "updated cart";  
    } else {
      $_SESSION['flash'][] = "update: could not update cart";  
    }
  } else {
    $_SESSION['flash'][] = 'Quantity must be a positive number';
  }
  $_REQUEST['action'] = 'index';

?>