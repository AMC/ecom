<?php

# Everything must be in a single php block otherwise the header re-direct will not work

$random_password = substr(hash('sha1', $email), 0,7);
  $salt = hash('whirlpool', $random_password); 
  $password_hash = hash('sha1', $random_password . $salt);

  $user = $db->query("SELECT email FROM users WHERE email='$email'");
  if ($user->num_rows == 0) {
    $_SESSION['flash'][] = "That email address is not registered";
  } else {
    $db->query("UPDATE users SET password_hash='$password_hash' WHERE email='$email'"); 
    $_SESSION['flash'][] = "Password Reset";
    if (mail($email, 'HAV Western Wear - Password Reset', 'Your password has been reset to: $random_password') ) {
      $_SESSION['flash'][] = "Email Sent";
    } else {
      $_SESSION['flash'][] = "Unable to send Email";
      echo "Sigh";
    }
  }
  header('Location: index.php');    
?>
