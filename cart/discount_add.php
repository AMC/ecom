<?php

  
  if ( empty($promo_code) ) {
    $_SESSION['flash'][] = 'You must specify a discount code';
  } else {
    $promos = $db->query("SELECT * FROM promotions WHERE promo_code='$promo_code' AND start < CURDATE() AND end > CURDATE()");
    if ($promos->num_rows == 1) {
      $promo = $promos->fetch_array(MYSQLI_ASSOC);
      $promotion = $promo['name'];

      $db->query("UPDATE cart SET discount_code='$promo_code', promotion='$promotion' WHERE id='$cart_id' ");
      $_SESSION['flash'][] = "Promotion: $promotion applied to cart";
    }
  }


  $_REQUEST['action'] = 'index';

?>