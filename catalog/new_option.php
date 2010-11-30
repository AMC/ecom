<?php

  if (role() != 'admin') {
    $_SESSION['flash'][] = 'Access denied';
    header("Location: index.php");
  } else if ( empty($option_name) || empty($option) ) {
    $_SESSION['flash'][] = 'option name and option required';
  } else if ( $price_impact != "" && !is_numeric($price_impact)) {
    $_SESSION['flash'][] = 'price impact must be a number';
  } else {
    $result = $db->query("SELECT * FROM product_options WHERE product_id='$product_id' AND option_name='$option_name' AND options='$option'");
    if ($result->num_rows == 0) {
    $db->query("INSERT INTO product_options (product_id, option_name, options, price_impact) VALUES('$product_id', '$option_name', '$option', '$price_impact')");
      if ($db->affected_rows != 0) {
        $_SESSION['flash'][] = 'option added ' . $product_id;
      } else {
        $_SESSION['flash'][] = 'unable to add option, error: ' . $db->error;
      }
    } else {
      $_SESSION['flash'][] = 'option already exists';
    }
  }
  
$_SESSION['flash'][] = $product_id;

$_REQUEST['action'] = 'view_product';

?>