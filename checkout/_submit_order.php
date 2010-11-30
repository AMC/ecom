<?php

$db->query("UPDATE cart SET status='Pending', created=CURDATE() WHERE id='$cart_id'");

if ($db->error) {
  $_SESSION['flash'][]='Unable to submit order';
  $_REQUEST['action'] = 'finalize_order';
} else {
  $email = $db->query("SELECT email FROM cart WHERE id='$cart_id'");
  $email = $email->fetch_array(MYSQLI_ASSOC);
  $email = $email['email'];
  $_SESSION['flash'][] = 'Order Submitted';
  
  include('checkout/email_order_confirmed.php');
  #include('checkout/email_order_notification.php');
  
  $db->query("INSERT INTO cart(id) VALUES (null)");
  $_SESSION['cart_id'] = $db->insert_id;
  $cart_id = $_SESSION['cart_id'];
  //$_SESSION['flash'][] = 'new cart created';
  
  
  
  
  header("Location: checkout.php?action=thank_you&email=$email");
}

?>