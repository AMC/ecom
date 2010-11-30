
<?php $subtotal_products = 0; ?>
<?php $subtotal_discount = 0; ?>

<?php $cart_items = $db->query("SELECT product_id, quantity, price, options FROM cart_products WHERE cart_id='$cart_id'"); ?>
<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
<?php $discount = $cart['discount']; ?>
<?php $discount = $cart['shipping']; ?>

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
        <?php $product = product($db, $cart_item['product_id']); ?>
        <?php $subtotal_products = $subtotal_products + $cart_item['quantity'] * $cart_item['price']; ?>      
        
      <tr>
        <td style="text-align: center ">
          <form action='cart.php' method='POST'>
            <input type='text' name='quantity' value="<?php echo $cart_item['quantity']; ?>" size='2' />
            <input type='hidden' name='action' value='update_cart' />
            <input type='hidden' name='return_page' value='<?php echo $return_page; ?>'>
            <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
            <input type='hidden' name='name' value='<?php echo $product['name']; ?>' />
            <input type='hidden' name='options' value='<?php echo $cart_item['options']?>'>
          
            <input type='submit' class='button' value='update' />
          </form>
        </td>

        <td>
          <?php echo $product['name']; ?>
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
          <a class='button' href="cart.php?action=delete_product&product_id=<?php echo $cart_item['product_id']; ?>">delete </a>
        </td>
      
      </tr>

    <?php } ?>  

    <tr>
      <td></td>
      <td style='text-align: right; padding-top: 5px;'>

        <?php include('cart/discount_apply.php'); ?>
        
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
      <td></td>
      <td style='text-align: right;'>Sales Tax: </td>
      <td style='text-align: right;'> 
        <?php $carts = $db->query("SELECT state FROM cart WHERE id='$cart_id'"); ?>
        <?php $cart = $carts->fetch_array(MYSQLI_ASSOC); ?>
        <?php if ( $cart['state'] == 'Washington') { ?>
          <?php $tax = ($subtotal_products + $discount) * .087; ?>
          <?php echo money_format('%(#10n', $tax); ?>
        <?php } else { ?>
          <?php $tax = 0; ?>
        <?php } ?>
      </td>
    </tr>
  
  
    <tr>
      <td></td>
      <td></td>
      <td style='text-align: right;'>Total: </td>
      <td style='text-align: right;'> 
      
        <?php $order_total = $subtotal_products + $discount + $tax; ?>
      
        <?php if ($order_total > 0) { echo money_format('%(#10n', $order_total);} ?>
          <?php $db->query("UPDATE cart SET tax='$tax', total='$order_total' WHERE id='$cart_id'"); ?>
          
      </td>
    </tr>

    <?php if (action() != 'finalize_order') { ?>
    <tr>
      <td colspan=5 style='text-align: right'><a href='checkout.php?action=billing_info' class='button'>checkout</a></td>
    </tr>
    <?php } ?>
  
  
  </table>
<?php } ?>


<br />