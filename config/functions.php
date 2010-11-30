<?php

function user_id() {
  if (isset($_SESSION['user']['id'])) {
    return $_SESSION['user']['id'];
  } else {
    return null;
  }
}

function role() {
  if (!isset($_SESSION['user'])) {
    return 'user';
  } elseif  ($_SESSION['user']['role'] != 'admin') {
    return 'user';
  } else {
    return 'admin';
  }
}

function action() {
  if (isset($_REQUEST['action'])) {
    return $_REQUEST['action'];
  } else {
    return 'none';
  }
}

function product($db, $id) {
  $product = $db->query("SELECT * FROM products WHERE id='$id'");
  return $product->fetch_array(MYSQLI_ASSOC);
}

function resize_img($image, $new_width) {
  if (file_exists($image)) {
    $img_info = getimagesize($image);
    $width = $img_info[0];
    $height = $img_info[1];
  
    $reduction = $new_width / $width;
    $new_height = $reduction * $height;
  
    return "<img src='$image' width='$new_width' height='$new_height' />";
  }
  $width_height = $new_width . "x" . $new_width;
  return "<img src='images/no-image.gif' width='$new_width' height='$new_width' />";
}

function resize_popup_img($image, $new_width) {
  if (file_exists($image)) {
    $img_info = getimagesize($image);
    $width = $img_info[0];
    $height = $img_info[1];
  
    $reduction = $new_width / $width;
    $new_height = $reduction * $height;
    return "<a rel='image_gallery' href='$image' title=''><img alt='' src='$image' height=$new_height width=$new_width /></a>";  
  }
  $width_height = $new_width . "x" . $new_width;
  return "<img src='images/no-image.gif' width='$new_width' height='$new_width' />";
}

function cart_id($db) {
  if (empty($_SESSION['cart_id'])) {
    $db->query("INSERT INTO cart(id) VALUES (null)");
    $_SESSION['cart_id'] = $db->insert_id;
    $cart_id = $_SESSION['cart_id'];
    $_SESSION['flash'][] = 'new cart created';
  } else {
    $cart_id = $_SESSION['cart_id'];
  }
  return $cart_id;
}

function cart_empty($db) {
  $cart_id = cart_id($db);
  $products = $db->query("SELECT * FROM cart_products WHERE cart_id='$cart_id'");
  if ($products->num_rows == 0 ) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function cart_contents($db, $cart_id) {  # Incomplete, not sure if necessary
  $cart_items = $db->query("SELECT product_id, quantity, options FROM cart_products WHERE cart_id='$cart_id'");
  $order_total = 0;

  while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) {
    $product = product($db, $cart_item['product_id']);
    $product_subtotal = $cart_item['quantity'] * $product['price'];
    $order_total = $order_total + $product_subtotal;
    

    echo "<div style='float: left; width: 100px;'>" .  $cart_item['quantity'] . "</div>";
    echo "<div style='float: left; width: 400px;'>" . $product['name'] . "  " . $cart_item['options'] . "</div>";
    echo "<div style='float: left; width: 100px;'>" . $product['price'] . "</div>";
    echo "<div style='float: left; width: 100px;'>" . $product_subtotal . "</div>";
    echo "<div style='clear:both;></div>";
  }
}

function request_var($db, $var) {
  if (isset($_REQUEST[$var])) 
  {    
    $var = trim($_REQUEST[$var]); 
    $var = $db->real_escape_string($var); 
    $var = str_replace("'", "&#39;", $var);
    return $var;
  } else {
    return NULL;
  }
}

function product_input_box($array, $value) {
  if (role() == 'admin' && action() == 'new') {
      return "<input type='text' name='$value' size='20' />";
  } else if (role() == 'admin') {
    if ($array[$value]) {
      $array_value = $array[$value];
      return "<input type='text' name='$value' value='$array_value' size='20' />";
    } else {
      return "<input type='text' name='$value' size='20' />";
    }
  } else {
    if ($array[$value]) {
      $array_value = $array[$value];
      return "$array_value <input type='hidden' name='$value' value='$array_value' size='50' readonly='readonly' />";
    } else {
      return "<input type='hidden' name='$value' size='20' />";
    }
  }
}

function product_status($status) {
  if (role() == 'admin'){
    if (isset($status) == FALSE) {
      return "<input type='checkbox' name='discontinued' value='discontinued' checked='checked' />";
    } else {
      return "<input type='checkbox' name='discontinued' value='discontinued' />";
    }
  } else {
    if (isset($status) == FALSE) {
      return "Discontinued";
    } else {
      return "In Stock";
    }
  }
}

function product_shipping_category($db, $selected_category) {
  if (role() == 'admin') {
    $shipping_categories = $db->query("SELECT id, category, rate FROM shipping");
    echo "<select name='shipping_id'>";

    while ($shipping_category = $shipping_categories->fetch_array(MYSQLI_ASSOC)) {
      if ($shipping_category['id'] == $selected_category) {          
        echo "<option value='" . $shipping_category['id'] ."' selected='selected'>" . $shipping_category['category'] . " : $" . $shipping_category['rate'] . " </option>";
      } else {
        echo "<option value='" . $shipping_category['id'] ."' >" . $shipping_category['category'] . " : $" . $shipping_category['rate'] . " </option>";
      }
    }
    echo "</select>";
  } else {
    $shipping = $db->query("SELECT id, rate FROM shipping WHERE id='$selected_category'");
    $shipping = $shipping->fetch_array(MYSQLI_ASSOC);
    echo money_format('%(#10n', $shipping['rate']);
    
  }
}

function product_description($description) {
  if (role() == 'admin'){
    return "<textarea name='description' style='width: 100%;'>$description</textarea>";
  } else {
    return $description;
  }
}

function order_status($current_status) {
  $statuses = array('','Pending', 'Shipped', 'Delivered', 'Cancelled', 'Returned');
  echo "<select name='order_status'>";
    foreach ($statuses as $status) {
      if ($current_status == $status) {
        echo "<option selected='selected'> $status </option>";
      } else {
        echo "<option> $status </option>";
      }
    }
  echo "</select>";
}

function state($name, $selected_state) {
  $states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');
  echo "<select name='$name'>";
  foreach ($states as $state) {
    if ($selected_state == $state) {
      echo "<option selected='selected'> $state </option>";
    } else {
      echo "<option> $state </option>";
    }
  }
  echo "</select>";

}

function month($name, $selected_month_key) {
  $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
  echo "<select name='$name'>";
  foreach ($months as $key => $month) {
    if ($month == $selected_month_key) {
      echo "<option value='$key' selected='selected'> $month </option>";
    } else {
      echo "<option value='$key'> $month </option>";
    }
  }
  echo "</select>";
}

function year($name, $selected_year) {
  $year = date('Y');
  echo "<select name='$name'>";
  for ($i = 0; $i <= 4; $i++) {
    $current_year = $year + $i;
    if ($current_year == $selected_year) {
      echo "<option selected='selected'> $current_year </option>";
    } else {
    echo "<option> $current_year </option>";
    }
  }
  echo "</select>";
}

function show_shipping_info($db, $cart_id) {
  $cart = $db->query("SELECT name, int_address, address, address2, city, state, zip_code FROM cart WHERE id='$cart_id'"); 
  $cart = $cart->fetch_array(MYSQLI_ASSOC); 
  ?>
  
  <table id="shipping" style='width: 45%; float: left'>
    <tr>
      <td colspan='2'>  
        <?php if (empty($_SESSION['international'])) { ?>
          <a href="checkout.php?action=shipping_info" class='button'>edit</a> 
        <?php } else { ?>
          <a href="checkout.php?action=int_shipping_info" class='button'>edit</a> 
        <?php } ?>
      </td>
    </tr>
    <th colspan='2' style='text-align: left;'> Shipping Information: </th>
    <tr>
      <td>Name:</td>
      <td><?php echo $cart['name'];?> </td>
    </tr>
    
    <?php if ($cart['address'] != "") { ?>
    <tr>
      <td>Address:</td>
      <td><?php echo $cart['address'];?> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo $cart['address2'];?> </td>
    </tr>
    <tr>
      <td>City, State, Zip:</td>
      <td><?php echo $cart['city'] . ", " . $cart['state'] . " " . $cart['zip_code'];?> </td>
    </tr>
    
    <?php } else { ?>
    <tr> 
      <td></td>
      <td>INTERNATIONAL ORDER </td>

    </tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $cart['int_address']; ?></td>
    </tr>
    
    <?php } ?>
    
  </table>
  
  <?
}

function show_billing_info($db, $cart_id) {
  $cart = $db->query("SELECT email, phone, cc_name, cc_type, cc_number, cc_address, cc_address2, cc_city, cc_state, cc_zip_code FROM cart WHERE id='$cart_id'"); 
  $cart = $cart->fetch_array(MYSQLI_ASSOC);
  ?>
  <table id="billing" style='width: 45%; float: right'>
    <tr>
      <td colspan='2'>
        <?php if (empty($_SESSION['international'])) { ?>  
          <a href="checkout.php?action=billing_info" class="button">edit</a> </td>
        <?php } else { ?>
          <a href="checkout.php?action=int_billing_info" class="button">edit</a> </td>
        <?php } ?>
    </tr>
    <th colspan='2' style='text-align: left;'> Billing Information: </th>
    <tr>
      <td>Name:</td>
      <td><?php echo $cart['cc_name'];?> </td>
    </tr>
    
    <tr>
      <td>Email: </td>
      <td><?php echo $cart['email'];?> </td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td><?php echo $cart['phone'];?> </td>
    </tr>
    
    <tr>
      <td>Card:</td>
      <td><?php echo $cart['cc_type'] . " " . substr($cart['cc_number'], -4, 4) ;?> </td>
    </tr>

    <tr>
      <td>Address:</td>
      <td><?php echo $cart['cc_address'];?> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo $cart['cc_address2'];?> </td>
    </tr>
    <tr>
      <td>City, State, Zip:</td>
      <td><?php echo $cart['cc_city'] . ", " . $cart['cc_state'] . " " . $cart['cc_zip_code'];?> </td>
    </tr>

    
  </table>
  <?
}

function get_shipping_rate($db, $shipping_id) {
  $shipping_rates = $db->query("SELECT rate FROM shipping WHERE id='$shipping_id' ");
  $shipping_rate = $shipping_rates->fetch_array(MYSQLI_ASSOC);
  return $shipping_rate['rate'];
}


?>