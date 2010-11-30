<?php

$file_types = array("image/jpeg" => ".jpg", "image/pjpeg" => ".jpg", "image/gif" => ".gif", "image/png" => ".png");
$manufacturer_reference = $_REQUEST['manufacturer_reference'];
$type = $_REQUEST['type'];

if (!$_FILES['image']['tmp_name']) {
	$_SESSION['flash'][] = 'No image uploaded';

} elseif (empty($manufacturer_reference) || empty($type)) {
	$_SESSION['flash'][] = 'Reference or image type missing';

} else {
  
  $file = $_FILES['image']['tmp_name'];
  $file_info = getimagesize($file);
  $file_type = $file_info['mime'];
  
  
  if (!array_key_exists($file_type, $file_types)) {
  	$_SESSION['flash'][] = 'Unsupported file type';
  } else {

    if ($type == 'main') {
      $filename = $manufacturer_reference;
    } elseif ($type == 'thumbnail') {
      $filename = $manufacturer_reference . "-tn";
    } else {
      $i = 1;
      do {
       $filename = $manufacturer_reference . "-" . $i;
       $i++;

       //echo $filename . $file_types[$file_type] . " exists: " . (file_exists($filename . $file_types[$file_type])) . "<br />";
       
      } while (file_exists("product_images/" . $filename . $file_types[$file_type]));
      
      
    }

    $filename = $filename . $file_types[$file_type];

    if (copy ($file, "product_images/" . $filename)) {
    	$_SESSION['flash'][] = 'File uploaded';
    } else {
    	$_SESSION['flash'][] = 'Error uploading file';
    }
  
  }  
}

header("Location: catalog.php?action=view_product&product_id=$product_id");


?>