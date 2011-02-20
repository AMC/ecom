<?php 
$form_errors = 0;

#TODO Any other validations?

if ($form_errors == 0) {

  if ($db->query("UPDATE cart SET tax='$tax', shipping='$shipping', discount='$discount', total='$total' WHERE id='$cart_id' ")) {
    $_SESSION['flash'][] = 'Order information saved';
  } else {
    $_SESSION['flash'][] = $db->error;
    echo $db->error;
  }

}

$_REQUEST['action'] = 'order_details';


?>