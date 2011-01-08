<?php

if ( empty($hs_name) || empty($hs_ground) || empty($hs_third_day) || empty($hs_second_day) || empty ($hs_next_day)) {
  $_SESSION['flash'][] = 'Please complete all fields';
  $_REQUEST['action'] = 'shipping_table';
} else {
   if ($hs_display == TRUE) { $hs_display = 1; } else { $hs_display = 0; }
   $db->query("UPDATE holiday_shipping SET display=$hs_display, name='$hs_name', ground='$hs_ground', third_day='$hs_third_day', second_day='$hs_second_day', next_day='$hs_next_day'");
    if ($db->affected_rows == 1 ) {
      $_SESSION['flash'][] = 'Holiday Shipping Updated';
      $_REQUEST['action'] = 'shipping_table';  
    } else {
      $_SESSION['flash'][] = 'No changes made';
      $_REQUEST['action'] = 'shipping_table';  
    }
}


?>