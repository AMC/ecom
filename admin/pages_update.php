<?php

if ( $file = $_FILES['page_file']['tmp_name']) { 
  $file_info = getimagesize($file);
  $file_type = $file_info['mime'];
  if ( $file_type == 'image/png' ) {
    $filetype = '.png';
  } elseif ( $file_type = 'image/jpg' || $file_type == 'image/jpeg' ) {
    $filetype = '.jpg';
  }
  
  if ( empty($page_id) ) {
    $_SESSION['flash'][] = 'No page specified';
  } elseif ( $file_type != 'image/png' && $file_type != 'image/jpg' && $file_type != 'image/jpeg' ) {
    $_SESSION['flash'][] = 'File must be a JPG or PNG';
  } elseif (!copy($file, 'files/pages-' . $page_name . $filetype )) {
    $_SESSION['flash'][] = 'Could not write file';
  } else {
    $db->query("UPDATE pages SET filetype='$filetype' WHERE id=$page_id");
    $_SESSION['flash'][] = 'Image updated';
  }
}

if ( !empty($page_id) ) {
  $page_description = nl2br($page_description);
  
  $db->query("UPDATE pages SET description='$page_description' WHERE id=$page_id");
  $_SESSION['flash'][] = 'Description Updated';
}









$_REQUEST['action'] = 'edit_page';

?>