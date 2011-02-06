<?php

if ( !empty($page_id) ) {
  $page_description = nl2br($page_description);
  
  $db->query("UPDATE pages SET description='$page_description' WHERE id=$page_id");
  $_SESSION['flash'][] = 'Description Updated';
}

$_REQUEST['action'] = 'edit_page';

?>