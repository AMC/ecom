
<?php $discount = 0; ?>
<?php $subtotal_products = 0; ?>
<?php $subtotal_discount = 0; ?>
<?php $subtotal_shipping = 0; ?>

<?php $cart_items = $db->query("SELECT products.id, products.name, products.price, cart_products.apply_discount, cart_products.quantity, cart_products.options FROM cart_products, products WHERE cart_products.cart_id='$cart_id' AND cart_products.product_id = products.id "); ?>


<br />

<?php if ($cart_items->num_rows == 0 ) { ?>
  <div style='width: 100%; text-align: center;'>
    <h3> Your cart is empty </h3>
  </div>
<?php } else { ?>
  <table id='cart'>
    <th style="width: 180px;"> Quantity </th>
    <th style="width: 300px;"> Product </th>
    <th style="width: 100px; text-align: right;"> Price </th>
    <th style="width: 100px;"></th>
    <th style="width: 120px; text-align: right;">
      <?php if (!cart_empty($db)) { ?> 
        <a href="cart.php?action=empty_cart&return_page=<?php echo $return_page; ?>" class='button'>empty cart</a>
      <?php } ?>
    </th>
  
    <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
      <?php if ($cart_item['apply_discount'] == 1) { $subtotal_discount =  $subtotal_discount + ($cart_item['price'] * $cart_item['quantity']); } ?>
      <?php $subtotal_products = $subtotal_products + $cart_item['quantity'] * $cart_item['price']; ?>      
        
      <tr>
        <td style="text-align: center ">
          <form action='cart.php' method='POST'>
            <input type='text' name='quantity' value="<?php echo $cart_item['quantity']; ?>" size='2' />
            <input type='hidden' name='action' value='update_cart' />
            <input type='hidden' name='return_page' value='<?php echo $return_page; ?>'>
            <input type='hidden' name='product_id' value='<?php echo $cart_item['id']; ?>' />
            <input type='hidden' name='name' value='<?php echo $cart_item['name']; ?>' />
            <input type='hidden' name='options' value='<?php echo $cart_item['options']?>'>
          
            <input type='submit' class='button' value='update' />
          </form>
        </td>

        <td>
          <?php echo $cart_item['name']; ?>
          <?php $option_ids = explode(",", $cart_item['options']); ?>

          <? foreach ($option_ids as $option_id) {?>
              <?php $options = $db->query("SELECT option_name, options, price_impact FROM product_options WHERE id='$option_id'")?>
              <?php while ($option = $options->fetch_array(MYSQLI_ASSOC)) { ?>
                <?php if ( $option['price_impact'] == 0 ) { $price_impact = ""; } else {$price_impact = " + " . $option['price_impact'];} ?>
                <?php echo " - " . $option['options'] . $price_impact ?>

              <?php } ?>
          <? } ?>  
        </td>

        <td style="text-align: right;">
          <?php echo money_format('%(#10n', $cart_item['price']); ?>
        </td>
      
        <td style="text-align: right;">

          <?php echo money_format('%(#10n', $cart_item['price'] * $cart_item['quantity']); ?>
        </td>
      
        <td style='text-align: right;'>
          <a class='button' href="cart.php?action=delete_product&product_id=<?php echo $cart_item['product_id']; ?>">delete</a>
        </td>
      
      </tr>

    <?php } ?>  
    
    
    <?php // APPLY DISCOUNT ?>
    <?php $promotions = $db->query("SELECT promotions.name, promotions.promo_code, promotions.discount_percent, promotions.discount_amount, promotions.min_amount FROM promotions, cart WHERE cart.id = $cart_id AND cart.discount_code = promotions.promo_code"); ?>
    <?php $promotion = $promotions->fetch_array(MYSQLI_ASSOC); ?>

    <?php if ($promotion['min_amount'] < $subtotal_products) { ?>

      <?php if ($promotion['discount_percent'] > 0 ) { $discount = $subtotal_discount * ($promotion['discount_percent'] * .01) * (-1) ; } ?>

      <?php if ($promotion['discount_amount'] > 0 ) { $discount = $promotion['discount_amount'] * (-1) ; } ?>
    <?php } ?>

    <tr>
      <td></td>
      <td style='text-align: right; padding-top: 5px;'>
      
        <form action='cart.php' method='post'>
          <input type='text' name='promo_code' size='8' />
          <input type='hidden' name='action' value='discount_add' />
          <input type='submit' value='Add Discount' class='button'>
        </form>
      </td>
      
      <td style='text-align: right;'>Discount: </td>
      <td style='text-align: right;'> <?php echo money_format('%(#10n', $discount); ?>
    </tr>
    

    <tr>
      <td></td>
      <td style='text-align: right;'>
        <select name='shipping'>
          <option>Ground</option>
          <option>3rd Day</option>
          <option>2nd Day</option>
          <option>Next Day</option>
        </select>
        
      </td>
      <td style='text-align: right;'>Shipping: </td>
      <td style='text-align: right;'> 
        <?php $shipping = 9.99; ?>
        <?php echo money_format('%(#10n', $shipping); ?>
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td style='text-align: right;'>Total: </td>
      <td style='text-align: right;'> 
      
        <?php $order_total = $subtotal_products + $discount; ?>
      
        <?php if ($order_total > 0) { echo money_format('%(#10n', $order_total);} ?>
          <?php $db->query("UPDATE cart SET subtotal = $subtotal_products, total='$order_total', discount='$discount' WHERE id='$cart_id'"); ?>
          
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td></td>


      <td colspan='3' style='text-align: right; padding-top: 20px'> 
        <img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" align="left" style="margin-right:7px;">
      </td>
    </tr>  
  
  </table>
<?php } ?>


<br />