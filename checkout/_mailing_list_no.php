<?php

  $db->query("UPDATE cart SET email_opt_in=0 WHERE email='$email'");

  if ($db->error) {
    $_SESSION['flash'][] = "Unable to change mailing list status.";
  } else {
    $_SESSION['flash'][] = "You have been removed from out mailing list.";
  }
  
  header("Location: index.php");
?>