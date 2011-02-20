<?php

  $db->query("DELETE FROM promo_items WHERE id = $promo_item_id");
  if ($db->affected_rows > 0) {
    $_SESSION['flash'][] = $promo_item . ' in ' . $promo_type . ' removed from this promotion';
  } else {
    $_SESSION['flash'][] = 'Could not delete ' . $promo_item;
  }
  
  $_REQUEST['action'] = 'edit_promotion'

?>