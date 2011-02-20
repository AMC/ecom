<?php

if ($promo_type == 'Product') {
  $product_matches = $db->query("SELECT id FROM products WHERE manufacturer_reference='$promo_item'");
}

if ( empty($promo_type) || empty($promo_item) || empty($promo_id) ) {
  $_SESSION['flash'][] = 'Please complete all fields';

} elseif ($promo_type == 'Product' && $product_matches->num_rows == 0 ) {
  $_SESSION['flash'][] = 'Manufacturer Reference: ' . $promo_item . ' not found';

} else { 
  $matches = $db->query("SELECT item FROM promo_items WHERE promo_id = $promo_id AND type = '$promo_type' AND item = '$promo_item' ");
  if ($matches->num_rows == 0){
    $db->query("INSERT INTO promo_items (promo_id, type, item) VALUES ('$promo_id', '$promo_type', '$promo_item')");
    $_SESSION['flash'][] = $promo_item . ' added to ' . $promo_type;
  } else {
    $_SESSION['flash'][] = $promo_item . ' in ' . $promo_type . ' already exists in this promotion';
  }
}
  
  $_REQUEST['action'] = 'edit_promotion'

?>