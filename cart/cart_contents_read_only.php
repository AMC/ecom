
<?php $subtotal_products = 0; ?>

<?php $carts = $db->query("SELECT shipping, shipping_type, tax, promotion, discount_code, discount, total FROM cart WHERE id = $cart_id "); ?>
<?php $cart = $carts->fetch_array(MYSQLI_ASSOC); ?>

<br />

<?php $cart_items = $db->query("SELECT products.id, products.name, cart_products.quantity, cart_products.price FROM cart_products, products WHERE cart_id='$cart_id' AND cart_products.product_id = products.id"); ?>


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
  
      <tr>
        <td style="text-align: center ">
          <?php echo $cart_item['quantity']; ?>
          </form>
        </td>

        <td>
          <?php echo $cart_item['name']; ?>
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

    
    <tr>
      <td></td>
      <td colspan='2' style='text-align: right;'><?php echo $cart['promotion']; ?> Discount: </td>
      <td style='text-align: right;'> <?php echo money_format('%(#10n', $cart['discount']); ?>
    </tr>
    

    <tr>
      <td></td>
      <td colspan='2' style='text-align: right;'><?php echo $cart['shipping_type']; ?> Shipping: </td>
      <td style='text-align: right;'> 
        <?php if (empty($_SESSION['international'])) { ?>
          <?php echo money_format('%(#10n', $cart['shipping']); ?>
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
        <?php echo money_format('%(#10n', $cart['tax']); ?>
      </td>
    </tr>

  
    <tr>
      <td></td>
      <td></td>
      <td style='text-align: right;'>Total: </td>
      <td style='text-align: right;'> 
      
        <?php if ($cart['total'] > 0 ) { echo money_format('%(#10n', $cart['total']);} ?>

      </td>
    </tr>

  </table>
<?php } ?>


<br />