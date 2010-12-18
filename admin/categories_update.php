<?php

$file_types = array("image/jpeg" => ".jpg", "image/pjpeg" => ".jpg", "image/gif" => ".gif", "image/png" => ".png");
$category = str_replace(' ', '_', $_REQUEST['category']);
$type = $_REQUEST['type'];

if (!$_FILES['image']['tmp_name']) {
	$_SESSION['flash'][] = 'No image uploaded';

} elseif (empty($category) || empty($type)) {
	$_SESSION['flash'][] = 'Reference or image type missing';

} else {
  
  $file = $_FILES['image']['tmp_name'];
  $file_info = getimagesize($file);
  $file_type = $file_info['mime'];
  
  
  if (!array_key_exists($file_type, $file_types)) {
  	$_SESSION['flash'][] = 'Unsupported file type';
  } else {

    $filename = 'CAT-' . $category . $file_types[$file_type];

    if (copy ($file, "product_images/" . $filename)) {
    	$_SESSION['flash'][] = 'File uploaded';
    } else {
    	$_SESSION['flash'][] = 'Error uploading file';
    }
  
  }  
}

$_REQUEST['action'] = 'categories';

?>