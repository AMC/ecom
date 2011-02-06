<?php
 
$cart_items = $db->query("SELECT product_id, quantity, options, price FROM cart_products WHERE cart_id='$cart_id'");
$cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'");
$cart = $cart->fetch_array(MYSQLI_ASSOC);
 
  $my_email = 'orders@SafariStuff.org';
  $my_name = 'Safari Stuff';
 
   require("lib/class.phpmailer.php");
   
   $mail = new PHPMailer();
 
   $mail = new PHPMailer(); // defaults to using php "mail()"
   
   $mail->AddReplyTo($my_email, $my_name);
   $mail->SetFrom($my_email, $my_name);
   $mail->AddReplyTo($my_email, $my_name);

   $mail->AddAddress($email,  $cart['name']);
   $mail->AddAddress($my_email,  $my_name);

   $mail->Subject = "Order Received";

   $body = "
<html>
  <body>
    <h3>Safari Stuff Order #$cart_id</h3>
    <p>Your order has been received and is being processed. You will receive another email when it has shipped.</p>
    <p>Your order will be shipped to:</p>
    <ul style='list-style-type: none'>
      <li> " . $cart['name'] . "</li>
      <li> " . $cart['address'] . "</li>
      <li> " . $cart['address2'] . "<li>
      <li> " . $cart['city'] . ", ". $cart['state'] . " " . $cart['zip_code'] . "
    </ul>
      
    <table style='width: 800px; background: #DDD; color: #222; border: 1px solid #BBB; border-collapse: collapse; line-height: 1.5em'>
      <th style='text-align: center; width: 30px;'>Quantity</th>
      <th style='text-align: center; width: 570px;'>Product</th>
      <th style='text-align: right; width: 100px;'>Price</th>
      <th></th>";

  $color = '#EEE';
while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) {
  $product = product($db, $cart_item['product_id']);
  $body .= "<tr style='background: " . $color . ";'>";
  $body .= "  <td style='text-align: center;'>" . $cart_item['quantity'] . "</td>";
  $body .= "  <td style='text-align: left;'>"; 
  $body .=      $product['name'] . "<br />";
  $body .=      $product['manufacturer'] . " #" . $product['reference'];
  
  $option_ids = explode(",", $cart_item['options']);

  foreach ($option_ids as $option_id) {
    $options = $db->query("SELECT option_name, options, price_impact FROM product_options WHERE id='$option_id'");
    while ($option = $options->fetch_array(MYSQLI_ASSOC)) { 
      $body .= "&nbsp; &nbsp; &nbsp;" . $option['option_name'] . ": " . $option['options'];
    }
  }

  $body .= "  <td style='text-align: right;'>" . money_format('%(#10n', $cart_item['price']) . "</td>";
  $body .= "  <td style='text-align: right;'>" . money_format('%(#10n', $cart_item['quantity'] * $cart_item['price']) . "</td>";
  $body .= "</tr>";
  if ($color == '#EEE' ) { $color = '#DDD'; } else { $color = '#EEE'; }
}


$body .= "
      <tr>
        <td colspan='3' style='text-align: right;'> ". $cart['promotion'] ." Discount: </td>
        <td style='text-align: right;'> " . money_format('%(#10n', $cart['discount']) . " </td>
      </tr>
      <tr>
        <td colspan='3' style='text-align: right;'> ". $cart['shipping_type'] ." Shipping: </td>
        <td style='text-align: right;'> " . money_format('%(#10n', $cart['shipping']) . " </td>
      </tr>
      <tr>
        <td colspan='3' style='text-align: right;'> Tax: </td>
        <td style='text-align: right;'> " . money_format('%(#10n', $cart['tax']) . " </td>
      </tr>
      <tr>
        <td colspan='3' style='text-align: right;'> Total: </td>
        <td style='text-align: right;'> " . money_format('%(#10n', $cart['total']) . " </td>
      </tr>
      
    </table>
  </body>
</html>"; 


   $mail->MsgHTML($body);

   $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

   if(!$mail->Send()) {
     $_SESSION['flash'][] = "Mailer Error: " . $mail->ErrorInfo;
   } else {
     $_SESSION['flash'][] = "Message sent!";
   }
