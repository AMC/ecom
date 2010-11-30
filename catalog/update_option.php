<?php

  if (role() != 'admin') {
    $_SESSION['flash'][] = 'Access denied';
    header("Location: index.php");
  } else if ( empty($option_name) || empty($option) ) {
    $_SESSION['flash'][] = 'option name and option required';
  } else if ( $price_impact != "" && !is_numeric($price_impact)) {
    $_SESSION['flash'][] = 'price impact must be a number';
  } else {
    $db->query("UPDATE product_options SET option_name='$option_name', options='$option', price_impact='$price_impact' WHERE id='$option_id'");
      if ($db->affected_rows != 0) {
        $_SESSION['flash'][] = 'option updated';
      } else {
        $_SESSION['flash'][] = 'unable to update option, error: ' . $db->error;
      }
  }

$_REQUEST['action'] = 'view_product';

?>