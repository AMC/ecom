<?php

# Everything must be in a single php block otherwise the header re-direct will not work

if (empty($old_password) || empty($password) || empty($password_confirmation)) {
  $_SESSION['flash'][] = "Please complete all fields";
} else if (strlen($password) < 6) {
  $_SESSION['flash'][] = "Password must be at least 6 characters"; 
} else if ($password != $password_confirmation) {
  $_SESSION['flash'][] = "Password and confirmation do not match";
} else {
  $matches = $db->query("SELECT COUNT(id) FROM users WHERE password_hash = '$old_password_hash' AND id = '$user_id'"); 

  if ($matches->num_rows == 0) {
    $_SESSION['flash'][] = "Old password is not correct";
  } else {
    $db->query("UPDATE users SET password_hash = '$password_hash' WHERE id = '$user_id'");
    $_SESSION['flash'][] = "Password Updated";  
  }
}

$_REQUEST['action'] = 'user_information';



?>
