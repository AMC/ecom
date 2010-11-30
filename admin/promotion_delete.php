<?php

  if (empty($promo_id)) {
    $_SESSION['flash'][] = 'No id specified';
  } else {
    $db->query("DELETE FROM promotions WHERE id='$promo_id'");
    if ($db->affected_rows != 0) {
      $_SESSION['flash'][] = 'promotion deleted';
    } else {
      $_SESSION['flash'][] = 'unable to delete promotion - ' . $db->error;
    }
  }
  $_REQUEST['action'] = 'promotions';
  
?>
