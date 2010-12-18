<?php 

if (role() != 'admin') {
  $_SESSION['flash'][] = "Permission denied";
  header("Location: index.php");
} elseif ( empty($product_id) || empty($name) || empty($price) || empty($category) || empty($reference) ) {
  $_SESSION['flash'][] = 'Product must have a name, reference, price, category';
} elseif ( !is_numeric($price) ) {
  $_SESSION['flash'][] = 'Price must be a number';
} else {
  if ($db->query("UPDATE products SET name='$name', quantity='$quantity', manufacturer='$manufacturer', reference='$reference', upc='$upc', category='$category', price='$price', cost='$cost', weight='$weight', discontinued='$discontinued', description='$description' WHERE id='$product_id' ")) {
    $_SESSION['flash'][] = 'Product information saved';
  } else {
    $_SESSION['flash'][] = $db->error;
  }
    
}

$_REQUEST['action'] = 'view_product';


?>