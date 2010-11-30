<?php 
$form_errors = 0;

if (role() != 'admin') {
  $_SESSION['flash'][] = "Permission denied";
  header("Location: index.php");
}

if ( empty($product_id) || empty($name) || empty($price) || empty($category) || empty($manufacturer_reference) ) {
  $_SESSION['flash'][] = 'Product must have a name, reference, price, category';
  $form_errors++;
} elseif ( !is_numeric($price) ) {
  $_SESSION['flash'][] = 'Price must be a number';
  $form_errors++;
}

#TODO Any other validations?

if ($form_errors == 0) {
  if ($db->query("UPDATE products SET name='$name', manufacturer='$manufacturer', manufacturer_reference='$manufacturer_reference', upc='$upc', category='$category', collection='$collection', free_shipping='$free_shipping', price='$price', ws_price='$ws_price', dimensions='$dimensions', discontinued='$discontinued', description='$description', parent_category='$parent_category' WHERE id='$product_id' ")) {
    $_SESSION['flash'][] = 'Product information saved';
  } else {
    $_SESSION['flash'][] = $db->error;
  }

}

$_REQUEST['action'] = 'view_product';


?>