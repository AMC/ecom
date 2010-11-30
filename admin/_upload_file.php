<?php

$file = $_FILES['uploaded_file']['tmp_name'];
$filename = $_FILES['uploaded_file']['name'];

$path = 'files/' . $filename;

if( file_exists($path) ){
	$_SESSION['flash'][] = 'File already exists';
}

if( copy($file, $path) ) {
	$_SESSION['flash'][] = 'File uploaded';
} else {
	$_SESSION['flash'][] = 'Error uploading file';
}

$_REQUEST['action'] = 'process_products'

?>