<?php

# Everything must be in a single php block otherwise the header re-direct will not work

$form_errors = 0;

if (empty($email) || empty($password) || empty($password_confirmation) || empty($first_name) || empty($last_name) || empty($zip_code)) {
  $_SESSION['flash'][] = "Please complete all fields";
  $form_errors++;
} else if (strlen($password) < 6) {
  $_SESSION['flash'][] = "Password must be at least 6 characters"; 
  $form_errors++;
} else if ($password != $password_confirmation) {
  $_SESSION['flash'][] = "Password and confirmation do not match";
  $form_errors++;
} else if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
    $_SESSION['flash'][] = "Invalid email address";
    $form_errors++;
} else if (!is_numeric($zip_code)) {
    $_SESSION['flash'][] = "Invalid zip code";
    $form_errors++;
} else {
  $user = $db->query("SELECT email FROM users WHERE email = '$email'"); 
  if ($user->num_rows != 0) {
    $_SESSION['flash'][] = "Email address is already in use";
    $form_errors++;
  }
}

if ($form_errors == 0) {
  $db->query("INSERT INTO users(email, password_hash, first_name, last_name, zip_code, role ) VALUES ('$email', '$password_hash', '$first_name', '$last_name', '$zip_code', 'user')"); 
  if ($db->affected_rows == 1 ) {
    $_SESSION['flash'][] = "User Created";
    $_REQUEST['action'] = "login";  
    $just_registered = TRUE;
  }
} else {
  $_REQUEST['action'] = "register_user";  
}

?>
