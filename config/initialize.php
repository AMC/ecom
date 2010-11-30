<?php 

session_start(); 

// print_r($_SESSION); // TODO: Remove

if (empty($_SESSION['flash'])) {$_SESSION['flash'] = array(); }

if (isset($require_https) && $require_https == TRUE) {
  if ($_SERVER['HTTPS'] != 'on') {
    $curl = "https://" . $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    header("Location: $curl");
  }
} else {
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) {
    $curl = "http://" . $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    header("Location: $curl");
  }
}

$_SERVER['flash'][] = "Welcome to the new site!";
  
$_SESSION['PHP_SELF'] = $_SERVER['PHP_SELF']; # Not used, but maybe changed to redirect user back to page after login

$stylesheets = array('layout.css'); 
$javascripts = array(	'menu.js');
 
setlocale(LC_MONETARY, 'en_US');


?>