<?php
  $db->query("INSERT INTO promo_parent (promotion_id, parent_category) VALUES ('$promo_id', '$promo_parent')");

  $_SESSION['flash'][] = 'Parent Category added';
  
  $_REQUEST['action'] = 'edit_promotion'

?>