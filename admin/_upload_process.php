<?php

$filename = "files/" . $_REQUEST['filename'];
$filedata = fopen($filename, "r");

$fieldname = fgetcsv($filedata); 

foreach ($fieldname as $key => $value) {
  $fieldname[$key] = strtolower(trim($value));
}


// American West Import
if ($fieldname[0] == 'item #' && $fieldname[1] = 'category' && $fieldname[2] == 'name' && $fieldname[3] == 'description' && $fieldname[4] == 'dimensions   (w x h x l)' && $fieldname[5] == 'ws price' && $fieldname[6] == 'msrp' && $fieldname[7] == 'strap length' && $fieldname[8] == 'collection'  && $fieldname[9] == 'upc code') {
  while (!feof($filedata)) { 
    $fields = fgetcsv($filedata); 
    if ($fields != NULL) { 
      $matches = $db->query("SELECT id FROM products WHERE manufacturer_reference='$fields[0]'");
      if ($matches->num_rows == 0 ) {
        // Replace the ' character with the html entity s
        for ($i = 0; $i < count($fields); $i++) {
          $fields[$i] = str_replace("'", "&#39;", $fields[$i]);
          $fields[$i] = str_replace('$', '', $fields[$i]);
        }
        $db->query("INSERT INTO products (manufacturer_reference, category, name, description, dimensions, ws_price, price, strap_length, collection, upc, manufacturer, discontinued) VALUES ('$fields[0]', '$fields[1]', '$fields[2]', '$fields[3]', '$fields[4]', '$fields[5]', '$fields[6]', '$fields[7]', '$fields[8]', '$fields[9]', 'American West', FALSE)");
      }
		}
  }
}

// Lou-Ella Import
if ($fieldname[0] == 'item number' && $fieldname[1] = 'collection' && $fieldname[2] == 'name' && $fieldname[3] == 'description' && $fieldname[4] == 'upc code' && $fieldname[5] == 'dimensions' && $fieldname[6] == 'ws price' && $fieldname[7] == 'msrp' && $fieldname[8] == 'category') {

  while (!feof($filedata)) { 
    $fields = fgetcsv($filedata); 
    if ($fields != NULL) { 
      $matches = $db->query("SELECT id FROM products WHERE manufacturer_reference='$fields[0]'");
      if ($matches->num_rows == 0 ) {

        // Replace the ' character with the html entity
        // Remove dollar sign
        for ($i = 0; $i < count($fields); $i++) {
          $fields[$i] = str_replace("'", "&#39;", $fields[$i]);
          $fields[$i] = str_replace('$', '', $fields[$i]);
        }
        $db->query("INSERT INTO products (manufacturer_reference, collection, name, description, upc, dimensions, ws_price, price, category, manufacturer, discontinued ) VALUES ('$fields[0]', '$fields[1]', '$fields[2]', '$fields[3]', '$fields[4]', '$fields[5]', $fields[6], '$fields[7]', '$fields[8]', 'Lou-Ella', FALSE)");
      }
		}
  }
}

// American West Import
if ($fieldname[0] == 'name' && $fieldname[1] = 'collection name' && $fieldname[2] == 'category' && $fieldname[3] == 'description' && $fieldname[4] == 'manufacturer reference' && $fieldname[5] == 'sizes' && $fieldname[6] == 'price') {

  while (!feof($filedata)) { 
    $fields = fgetcsv($filedata); 
    if ($fields != NULL) { 
      $matches = $db->query("SELECT id FROM products WHERE manufacturer_reference='$fields[4]'");
      if ($matches->num_rows == 0 ) {

        // Replace the ' character with the html entity
        // Remove dollar sign
        for ($i = 0; $i < count($fields); $i++) {
          $fields[$i] = str_replace("'", "&#39;", $fields[$i]);
          $fields[$i] = str_replace('$', '', $fields[$i]);
        }
        $db->query("INSERT INTO products (name, collection, category, description, manufacturer_reference, price, manufacturer, discontinued ) VALUES ('$fields[0]', '$fields[1]', '$fields[2]', '$fields[3]', '$fields[4]', '$fields[6]', 'Schaefer', FALSE)");
        $product_id = $db->insert_id;
        $sizes = explode(",", $fields[5]);
        foreach ($sizes as $size) {
          $db->query("INSERT INTO product_options (product_id, option_name, options) VALUES ('$product_id', 'size', '$size')");
        }
        for ($i = 9; $i < 16; $i++) {
          if ( $fields[$i] != "" ) {
            $db->query("INSERT INTO product_options (product_id, option_name, options) VALUES ('$product_id', 'color', '$fields[$i]')");
          }
        }
      }
		}
  }
}





// Set Parent Category for Accessories
$db->query("UPDATE products SET parent_category='Accessories' WHERE category IN('Bracelets', 'Briefcases', 'Earrings', 'Handbags', 'Men&#39s; Wallets', 'Necklaces', 'Watches', 'Bolos', 'Buckles', 'Hair Clips', 'Jewelry Sets', 'Money Clips', 'Pocket Knives', 'Ladies&#39; Accessory')");
// Set Parent Category for Decor
$db->query("UPDATE products SET parent_category='Decor' WHERE category IN('Christmas', 'Frames', 'Kitchen', 'Office Decor', 'Sculptures', 'Elmer', 'Home Decor', 'Metal Wall Art', 'Pillows', 'Welcome Signs')");

// Free Shipping for American West and Lou-Ella products over $70
$db->query("UPDATE products SET free_shipping=TRUE WHERE manufacturer='American West' && price>70");
$db->query("UPDATE products SET free_shipping=TRUE WHERE manufacturer='Lou-Ella' && price>70");


$_SESSION['flash'][] = "Processed $filename";
$_REQUEST['action'] = 'process_products';
fclose($filedata);

?>