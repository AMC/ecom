<?php 
$form_errors = 0;

if (role() != 'admin') {
  $_SESSION['flash'][] = "Permission denied";
  header("Location: index.php");
}

if ( empty($name) || empty($price) || empty($category) || empty($manufacturer_reference) ) {
  $_SESSION['flash'][] = 'Product must have a name, reference, price and category';
  $form_errors++;
  $_REQUEST['action'] = 'new';
} elseif ( !is_numeric($price) ) {
  $_SESSION['flash'][] = 'Price must be a number';
  $form_errors++;  
  $_REQUEST['action'] = 'new';
} else {
  $matches = $db->query("SELECT id FROM products WHERE manufacturer_reference = '$manufacturer_reference'");
  if ($matches->num_rows > 0) {
    $_SESSION['flash'][] = 'Manufacturer Reference already in use';
    $form_errors++;  
    $_REQUEST['action'] = 'new';
  }
}

#TODO Any other validations?

if ($form_errors == 0) {
  $db->query("INSERT INTO products (name, manufacturer, manufacturer_reference, upc, parent_category, category, collection, free_shipping, price, ws_price, dimensions, discontinued, description) VALUES ('$name', '$manufacturer', '$manufacturer_reference', '$upc', '$parent_category', '$category', '$collection', '$free_shipping', '$price', '$ws_price', '$dimensions', '$discontinued', '$description')");
  $product_id = $db->insert_id;
  $_SESSION['flash'][] = "Product created, id#$product_id";

  header("Location: catalog.php?action=view_product&product_id=$product_id");
}




?>