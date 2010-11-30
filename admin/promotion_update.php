<?php
  
  if ( empty($promo_id) || empty($promo_name) || empty($promo_code) || empty($promo_start) || empty($promo_end) ) {
    $_SESSION['flash'][] = 'Promotion must have name, code, start and end date';
  } else if ( !is_numeric($promo_amount) || !is_numeric($promo_percent) ) {
    $_SESSION['flash'][] = 'Discount Amount and Percent must be a number';
  } else if ( empty($promo_amount) && empty($promo_percent) ) {
    $_SESSION['flash'][] = 'Discount must have an Amount or a Percent';
  } else if ( $promo_amount > 0 && $promo_percent > 0 ) {
    $_SESSION['flash'][] = 'Discount cannot be both an Amount and a Percent';
  } else {

    $db->query("UPDATE promotions SET name='$promo_name', promo_code='$promo_code', message='$promo_message', start='$promo_start', end='$promo_end', min_amount='$promo_min', discount_percent='$promo_percent', discount_amount='$promo_amount', storewide='$promo_storewide' WHERE id='$promo_id'");
    $_SESSION['flash'][] = 'Promotion updated';
  }

  $_REQUEST['action'] = 'edit_promotion';
?>
