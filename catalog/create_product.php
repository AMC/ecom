<?php 

if (role() != 'admin') {
  $_SESSION['flash'][] = "Permission denied";
  header("Location: index.php");
}

if ( empty($name) || empty($price) || empty($category) || empty($reference) ) {
  $_SESSION['flash'][] = 'Product must have a name, reference, price and category';
  $_REQUEST['action'] = 'new_product';
} elseif ( !is_numeric($price) ) {
  $_SESSION['flash'][] = 'Price must be a number';
  $_REQUEST['action'] = 'new_product';
} else {
  $matches = $db->query("SELECT id FROM products WHERE reference = '$reference'");
  if ($matches->num_rows > 0) {
    $_SESSION['flash'][] = 'Reference already in use';
    $_REQUEST['action'] = 'new_product';
  } else {
    $db->query("INSERT INTO products (name, manufacturer, reference, upc, category, price, cost, discontinued, description) 
      VALUES ('$name', '$manufacturer', '$reference', '$upc', '$category', '$price', '$cost', '$discontinued', '$description')");
    $product_id = $db->insert_id;
    $_SESSION['flash'][] = "Product created, id#$product_id";

    header("Location: catalog.php?action=view_product&product_id=$product_id");
    
    
  }
  
}





?>