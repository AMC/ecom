<?php

# Everything must be in a single php block otherwise the header re-direct will not work

if (empty($email) || empty($first_name) || empty($last_name) || empty($zip_code)) {
  $_SESSION['flash'][] = "Please complete all fields";
} else if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email) && $email != 'Admin') {
    $_SESSION['flash'][] = "Invalid email address";
} else if (!is_numeric($zip_code)) {
    $_SESSION['flash'][] = "Invalid zip code";
} else {
  $matches = $db->query("SELECT email FROM users WHERE email = '$email' and id != '$user_id'"); 
  if ($user->num_rows != 0) {
    $_SESSION['flash'][] = "Email address is already in use";
  } else {
    $db->query("UPDATE users SET email='$email', first_name='$first_name', last_name='$last_name', zip_code='$zip_code' WHERE id='$user_id' "); 
    $_SESSION['flash'][] = "User updated.";
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['first_name'] = $first_name;
    $_SESSION['user']['last_name'] = $last_name;
    $_SESSION['user']['zip_code'] = $zip_code;
  }
}

$_REQUEST['action'] = 'user_information';

?>
