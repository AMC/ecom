<?php
  if (unlink("product_images/" . $image)) {
    $_SESSION['flash'][] = "Image: $image deleted";
  } else {
    $_SESSION['flash'][] = "Unable to delete image: $image";
  }

  header("Location: catalog.php?action=view_product&product_id=$product_id");

?>