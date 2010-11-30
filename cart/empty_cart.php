<?php

  $db->query("DELETE FROM cart_products WHERE cart_id='$cart_id'");

  if ($db->affected_rows > 0) {
    $_SESSION['flash'][] = "emptied cart";  
  } else {
    $_SESSION['flash'][] = "could not empty cart";  
  }

  $_REQUEST['action'] = 'index';
?>