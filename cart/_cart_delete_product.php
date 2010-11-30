<?php

  $db->query("DELETE FROM cart_products WHERE cart_id='$cart_id' AND product_id='$product_id' ");

  if ($db->affected_rows > 0) {
    $_SESSION['flash'][] = "Removed product from cart";  
  } else {
    $_SESSION['flash'][] = "Could not remove product from cart";  
  }

  $_REQUEST['action'] = 'index';
?>