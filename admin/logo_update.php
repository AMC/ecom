<?php
  $file = $_FILES['logo_file']['tmp_name'];
  $file_info = getimagesize($file);
  $file_type = $file_info['mime'];
  
  if (!$file) {
    $_SESSION['flash'][] = 'No file uploaded';
  } elseif ($file_type != 'image/png') {
    $_SESSION['flash'][] = 'File must be a PNG';
  } elseif (!copy($file, 'files/logo.png')) {
    $_SESSION['flash'][] = 'Could not write file';
  } else {
    $_SESSION['flash'][] = 'Logo updated';
  }
  
  $_REQUEST['action'] = 'pages';


?>