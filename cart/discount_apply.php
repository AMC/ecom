<?php 

  $promo_codes = $db->query("SELECT discount_code FROM cart WHERE id='$cart_id' ");
  $promo_code = $promo_codes->fetch_array(MYSQLI_ASSOC);
  $promo_code = $promo_code['discount_code'];

  $promos = $db->query("SELECT * FROM promotions WHERE promo_code='$promo_code' AND start < CURDATE() AND end > CURDATE()");

  if ($promos->num_rows == 1) {
    $promo = $promos->fetch_array(MYSQLI_ASSOC);
    if ( $subtotal_products > $promo['min_amount'] && $promo['discount_percent'] > 0 ) {
      $discount = ($promo['discount_percent'] / 100) * $subtotal_products * -1;
    } elseif ($subtotal_products > $promo['min_amount'] ) {
      $discount = $promo['discount_amount'] * -1;
    } 
    
  } else {
    $discount = 0;
  }

  $db->query("UPDATE cart SET discount='$discount' WHERE id='$cart_id'");  

?>