
<?php $subtotal_products = 0; ?>
<?php $subtotal_discount = 0; ?>


<?php $cart_items = $db->query("SELECT product_id, quantity, price FROM cart_products WHERE cart_id='$cart_id'"); ?>
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
    </th>
  
    <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
    
        <?php $product = product($db, $cart_item['product_id']); ?>
        <?php $subtotal_products = $subtotal_products + $cart_item['quantity'] * $cart_item['price']; ?>
      
      
      <tr>
        <td style="text-align: center ">
          <?php echo $cart_item['quantity']; ?>
          </form>
        </td>

        <td>
          <?php echo $product['name']; ?>
        </td>

        <td style="text-align: right;">
          <?php echo money_format('%(#10n', $cart_item['price']); ?>
        </td>
      
        <td style="text-align: right;">
          <?php echo money_format('%(#10n', $cart_item['price'] * $cart_item['quantity'] ); ?>
        </td>
      
        <td style='text-align: right;'>
        </td>
      
      </tr>

    <?php } ?>  

    <?php include('cart/discount_apply.php'); ?>

    
    <tr>
      <td></td>
      <td colspan='2' style='text-align: right;'><?php echo $cart['promotion']; ?> Discount: </td>
      <td style='text-align: right;'> <?php echo money_format('%(#10n', $discount); ?>
    </tr>
    
  

    <tr>
      <td></td>
      <td colspan='2' style='text-align: right;'><?php echo $cart['shipping_type']; ?> Shipping: </td>
      <td style='text-align: right;'> 
        <?php if (empty($_SESSION['international'])) { ?>
          <?php echo money_format('%(#10n', $shipping); ?>
        <?php } else { ?>
          TBD
        <?php } ?>
      </td>
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
      
        <?php $order_total = $shipping + $subtotal_products + $discount + $tax; ?>
      
        <?php if ($order_total > 0 ) { echo money_format('%(#10n', $order_total);} ?>
          <?php $db->query("UPDATE cart SET tax='$tax', total='$order_total' WHERE id='$cart_id'")?>

      </td>
    </tr>

  </table>
<?php } ?>


<br />