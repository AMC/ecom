<?php

  if (role() != 'admin') {
    $_SESSION['flash'][] = 'Access denied';
    header("Location: index.php");
  } else {
    $db->query("DELETE FROM product_options WHERE id='$option_id'");
      if ($db->affected_rows != 0) {
        $_SESSION['flash'][] = 'option deleted';
      } else {
        $_SESSION['flash'][] = 'unable to delete option, error: ' . $db->error;
      }
  }

$_REQUEST['action'] = 'view_product';

?>