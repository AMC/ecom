<?php

if ( empty($hs_display) || empty($hs_name) || empty($hs_ground) || empty($hs_third_day) || empty($hs_second_day) || empty ($hs_next_day)) {
  $_SESSION['flash'][] = 'Please complete all fields';
  $_REQUEST['action'] = 'shipping_table';'
} else {
   $db->query("UPDATE holiday_shipping SET display=$hs_display, name='$hs_name', ground='$hs_ground', third_day='$hs_third_day', second_day='$hs_second_day', next_day='$hs_next_day'"); 
    if ($db->affected_rows == 1 ) {
      $_SESSION['flash'][] = 'Shipping Category Updated';
      $_REQUEST['action'] = 'shipping_table';  
    } else {
      $_SESSION['flash'][] = 'No changes made';
      $_REQUEST['action'] = 'shipping_table';  
    }
}


?>