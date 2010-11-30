<?php

  if (empty($shipping_category) || empty($shipping_rate)) {
    $_SESSION['flash'][] = 'Please complete all fields';
    $_REQUEST['action'] = 'shipping_table';
  } else if (!is_numeric($shipping_rate)) {
    $_SESSION['flash'][] = 'Please complete all fields';
    $_REQUEST['action'] = 'shipping_table';
  } else {
    echo "Woot";
    $db->query("INSERT INTO shipping(category, rate, notes) VALUES ('$shipping_category', '$shipping_rate', '$shipping_notes')"); 
    if ($db->affected_rows == 1 ) {
      $_SESSION['flash'][] = 'Shipping Category Created';
      $_REQUEST['action'] = 'shipping_table';  
    }
  }

?>