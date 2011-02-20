<?php
  
  if ( empty($promo_code) ) {
    $_SESSION['flash'][] = 'You must specify a discount code';
  } else {

    $promos = $db->query("SELECT * FROM promotions WHERE promo_code='$promo_code' AND start < CURDATE() AND end > CURDATE()");
    if ($promos->num_rows == 1) {
      $promo = $promos->fetch_array(MYSQLI_ASSOC);

      $promotion = $promo['name'];
      $promo_id = $promo['id'];
      
      $db->query("UPDATE cart SET discount_code='$promo_code', promotion='$promotion', discount=0 WHERE id='$cart_id' ");
      $db->query("UPDATE cart_products SET apply_discount = 0 WHERE id = $cart_id");
      if ($promo['storewide'] == 1) {
        $db->query("UPDATE cart_products SET apply_discount = 1 WHERE id = $cart_id");
      } else {
        // echo ("SELECT products.id, products.name, products.manufacturer, products.parent_category, products.category, products.collection, products.price FROM products, cart_products WHERE cart_products.cart_id = $cart_id AND cart_products.product_id = products.id");

        $promos = $db->query("SELECT id, type, item FROM promo_items WHERE promo_id = $promo_id ORDER BY type" );
        while ($promo = $promos->fetch_array(MYSQLI_ASSOC)) {
          if ($promo['type'] == 'Category') {
            $category = $promo['item'];

            $db->query("UPDATE cart_products, products SET apply_discount = 1 WHERE products.category = '$category' AND cart_products.cart_id = $cart_id AND cart_products.product_id = products.id");

          }
          if ($promo['type'] == 'Manufacturer') {
            $manufacturer = $promo['item'];
            $db->query("UPDATE cart_products, products SET apply_discount = 1 WHERE products.manufacturer = '$manufacturer' AND cart_products.cart_id = $cart_id AND cart_products.product_id = products.id");
          }
          if ($promo['type'] == 'Product') {
            $manufacturer_reference = $promo['item'];
            $db->query("UPDATE cart_products, products SET apply_discount = 1 WHERE products.reference = '$reference' AND cart_products.cart_id = $cart_id AND cart_products.product_id = products.id");
          }
        }
      }
      
      $_SESSION['flash'][] = "Promotion: $promotion applied to cart";
    }
  }


  $_REQUEST['action'] = 'index';

?>