<?php

  if ($shipping_id == 3 && $max_amt != 100000) {
    $max_amt = 100000;
    $_SESSION['flash'][] = "Top tier must be $max_amt";
  }

  if ( empty($shipping_id) || empty($max_amt) || empty($ground) || empty($third_day) || empty($second_day) || empty($next_day) ) {
    $_SESSION['flash'][] = 'Please complete all fields';
    $_REQUEST['action'] = 'shipping_table';
  } else if (!is_numeric($max_amt) || !is_numeric($ground) || !is_numeric($third_day) || !is_numeric($second_day) || !is_numeric($next_day)) {
    $_SESSION['flash'][] = 'Rates must be a number';
    $_REQUEST['action'] = 'shipping_table';
  } else if ($max_amt < $prev_max)  {
    $_SESSION['flash'][] = 'Maximum amount must be higher than previous tier';
    $_REQUEST['action'] = 'shipping_table';
  } else {
    $db->query("UPDATE shipping SET max_amt='$max_amt', ground='$ground', third_day='$third_day', second_day='$second_day', next_day='$next_day' WHERE id='$shipping_id'"); 
    if ($db->affected_rows == 1 ) {
      $_SESSION['flash'][] = 'Shipping Category Updated';
      $_REQUEST['action'] = 'shipping_table';  
    } else {
      $_SESSION['flash'][] = 'No changes made';
      $_REQUEST['action'] = 'shipping_table';  
    }
  }



?>