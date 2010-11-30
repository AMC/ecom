<?php

  if (empty($promo_name)) {
    $_SESSION['flash'][] = 'Promotion must have a name';
    $_REQUEST['action'] = 'promotions';
  } else {
    $matches = $db->query("SELECT name FROM promotions WHERE name='$promo_name'");
    if ($matches->num_rows != 0) {
      $_SESSION['flash'][] = 'that promotion already exists';
      $_REQUEST['action'] = 'promotions';
    } else {
      $db->query("INSERT INTO promotions (name) VALUES ('$promo_name')");
      $promo_id = $db->insert_id; 
      $_SESSION['flash'][] = 'Promotion created with ID#' . $promo_id;
      $_REQUEST['action'] = 'edit_promotion';
    }
  }

?>
