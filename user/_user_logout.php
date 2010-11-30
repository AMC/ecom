<?php 

# Everything must be in a single php block otherwise the header re-direct will not work


  setcookie(session_name(), "", time()-3600); 
  session_destroy(); 
  session_start();
  $_SESSION['flash'] = array();
  $_SESSION['flash'][] = "You have logged out";
  header('Location: index.php' ); 

?>