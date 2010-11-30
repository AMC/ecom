<?php
  # Create a connection to the database
  $db = new mysqli('localhost', 'root', 'root', 'ecom');
  
  # Test the database connection
  if ($db->ping()) {
    # $_SESSION['flash'][] = "database connected";
   } else {
    array_push($_SESSION['flash'], $mysqli->error);
   }

?>
