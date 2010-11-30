<?php
  $filename = "files/" . $_REQUEST['filename'];
  
  if (unlink($filename) ) {
    $_SESSION['flash'][] = "$filename was deleted";
  } else {
    $_SESSION['flash'][] = "could not delete $filename";
  }
  
  $_REQUEST['action'] = 'process_products';

?>