<?php

  $db->query("UPDATE cart SET email_opt_in=1 WHERE email='$email'");

  if ($db->error) {
    $_SESSION['flash'][] = "Unable to join mailing list.";
  } else {
    $_SESSION['flash'][] = "Thank you for joining our mailing list.";
  }
  
  header("Location: index.php");
?>