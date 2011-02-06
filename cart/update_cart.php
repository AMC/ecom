<?php

if ($quantity < 0 ) {
  $_SESSION['flash'][] = 'Quantity must be greater than 0';
} else {
  $db->query("UPDATE cart_products SET quantity='$quantity' WHERE cart_id='$cart_id' AND product_id='$product_id' AND options='$options'");

  if ($db->affected_rows > 0) {
    $_SESSION['flash'][] = "updated cart";  
  } else {
    $_SESSION['flash'][] = "update: could not update cart";  
  }
  
}
  $_REQUEST['action'] = 'index';

?>