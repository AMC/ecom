<?php 
$form_errors = 0;

if ( empty($name) || empty($email) || empty($address) || empty($city) || empty($state) || empty($zip_code) ) {
  $_SESSION['flash'] = 'Product must have a name, email, address, city, state and zip code';
  $form_errors++;
} 

#TODO Any other validations?

if ($form_errors == 0) {
  if ($order_status == 'Shipped' && $old_status == 'Ordered') {
    include("_email_order_shipped.php");
  }

  if ($db->query("UPDATE cart SET status='$order_status', name='$name', email='$email', phone='$phone', address='$address', address2='$address2', city='$city', state='$state', notes='$notes' WHERE id='$cart_id' ")) {
    $_SESSION['flash'][] = 'Order information saved';
  } else {
    $_SESSION['flash'][] = $db->error;
    echo $db->error;
  }

}

$_REQUEST['action'] = 'order_details';


?>