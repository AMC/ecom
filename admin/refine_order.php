<?php

if ( !empty($order_id) && !is_numeric($order_id)) {
  $_SESSION['flash'][] = 'Order must be a number';
}


if (empty($amt_low) || !is_numeric($amt_low) ) {
  $amt_low = 0;
}

if (empty($amt_high) || !is_numeric($amt_high) ) {
  $amt_high = 100000000;
}

if ($amt_low > $amt_high) {
  $amt_low = 0;
  $amt_high = 100000000;
}



$order_query = "SELECT * FROM cart 
                 WHERE id LIKE '%$order_id%' 
                 AND name LIKE '%$customer_name%'
                 AND status LIKE '%$order_status%'
                 AND status != ''
                 AND total BETWEEN $amt_low AND $amt_high";


?>