<?php 

# everything must be in a single php block otherwise the header re-direct will not work

include_once("config/initialize.php"); 
include_once("config/database.php");
include_once("config/functions.php");

$stylesheets[] = 'user.css';

# set variables and escape data

$email = request_var($db, 'email');

$old_password = request_var($db, 'old_password');
  $salt = hash('whirlpool', $old_password); 
  $old_password_hash = hash('sha1', $old_password . $salt);
$password = request_var($db, 'password');
  $salt = hash('whirlpool', $password); 
  $password_hash = hash('sha1', $password . $salt);
$password_confirmation = request_var($db, 'password_confirmation');

$first_name = request_var($db, 'first_name');
$last_name = request_var($db, 'last_name');
$zip_code = request_var($db, 'zip_code');
$user_id = user_id();





# Actions
# Must be in this order to work properly


if (action() == 'reset_password') {
  include("user/_user_reset_password.php");
}

if (action() == 'lost_password') {
  include("user/_user_lost_password.php");  
}

if (action() == 'create_user') {
  include("user/_user_creation.php"); 
}

if (action() == 'register_user') {
  include("user/_user_registration.php"); 
}

if (action() == 'login' && isset($email) && isset($password_hash)) {
  include("user/_user_login.php"); 
}

if (action() == 'logout') {
  include("user/_user_logout.php"); 
}

if (action() == 'update_password') {
  include("user/_user_update_password.php");
}

if (action() == 'update_user') {
  include("user/_user_update_user.php");
}


if (action() == 'user_information') {
  include("user/_user_change_information.php");
}

if (action() == 'none' || action() == '') { 
  header('Location: index.php'); 
}
// header('Location: index.php');    



   
?>