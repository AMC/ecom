<?php 
echo $shipped;
  if ($shipped > -1) {
    if ($db->query("UPDATE cart_products SET shipped='$shipped' WHERE cart_id='$cart_id' AND product_id='$product_id'")) {
      $db->query("UPDATE cart SET status='Partial' WHERE id='$cart_id'");
      $_SESSION['flash'][] = 'Order information saved';
    } else {
      $_SESSION['flash'][] = $db->error;
      echo $db->error;
    }
    
  } else {
    $_SESSION['flash'][] = 'Cannot ship negative items';
  }


$_REQUEST['action'] = 'order_details';


?>