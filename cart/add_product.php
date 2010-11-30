<?php

if ($quantity > 0) {
  $matches = $db->query("SELECT product_id, quantity FROM cart_products WHERE cart_id='$cart_id' AND product_id='$product_id' AND options='$options' ");
  if ($matches->num_rows == 0) {
    
    $option_ids = explode(",", $options);
    foreach ($option_ids as $option_id) {
      
      $options_string = $db->query("SELECT option_name, options, price_impact FROM product_options WHERE id='$option_id'");
      while ($option = $options_string->fetch_array(MYSQLI_ASSOC)) { 
        $price += $option['price_impact'];
      }
    } 

    $db->query("INSERT INTO cart_products(cart_id, product_id, quantity, price, options) VALUES ('$cart_id', '$product_id', '$quantity', '$price', '$options')"); 
    if ($db->affected_rows == 1) {
      $_SESSION['flash'][] = 'Added item to cart';
    } else {
      $_SESSION['flash'][] = 'Could not add item to cart';
    }

  } elseif ($matches->num_rows == 1) {
    $item = $matches->fetch_array(MYSQLI_ASSOC);
    $updated_quantity = $item['quantity'] + $quantity;
    $db->query("UPDATE cart_products SET quantity='$updated_quantity' WHERE cart_id='$cart_id' and product_id='$product_id'");
    if ($db->affected_rows == 1) {
      $_SESSION['flash'][] = 'Updated item in cart';
    } else {
      $_SESSION['flash'][] = 'Could not update item in cart';
    }

  } 
  
  
}

  $_REQUEST['action'] = 'index';

?>