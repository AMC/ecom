
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<?php $cart_items = $db->query("SELECT product_id, quantity, options FROM cart_products WHERE cart_id='$cart_id'"); ?>
<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
<?php $order_total = 0; ?>


<div id="container">
  <h3> Order #<?php echo $cart['id']; ?> </h3>
  <form action='admin.php' method='POST'>
  <input type='hidden' name='action' value='order_update' />
  <input type='hidden' name='cart_id' value='<?php echo $cart_id?>' />
  
    Status: <?php order_status($cart['status']); ?> <br />
    <input type='hidden' name='old_status' value='<?php echo $cart['status']; ?>'>
    <br />
    <table id="shipping" style='width: 45%; float: left'>
      <th colspan='2'> Shipping Information: </th>
      <tr>
        <td>Name:</td>
        <td><input type='text' name='name' value='<?php echo $cart['name'];?>' size='30' /> </td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type='text' name='email' value='<?php echo $cart['email'];?>' size='30' /> </td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td><input type='text' name='phone' value='<?php echo $cart['phone'];?>' size='30' /> </td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><input type='text' name='address' value='<?php echo $cart['address'];?>' size='30' /> </td>
      </tr>
      <tr>
        <td></td>
        <td><input type='text' name='address2' value='<?php echo $cart['address2'];?>' size='30' /></td>
      </tr>
      <tr>
        <td>City:</td>
        <td><input type='text' name='city' value='<?php echo $cart['city'];?>' size='30' </td>
      </tr>
      <tr>
        <td>State: </td>
        <td><?php state('state', $cart['state']); ?> </td>
      </tr>
      <tr>
        <td>Zip: </td>
        <td><input type='text' name='zip_code' value='<?php echo $cart['zip_code']; ?>' size='30' /> </td>
      </tr>
    </table>  
    
    <?php if ($cart['status'] == 'Pending' || $cart['status'] == 'Shipped') {?>
    <table id="billing" style='width: 45%; float: right'>
      <th colspan='2'> Billing Information: </th>
      <tr>
        <td>Name:</td>
        <td><?php echo $cart['cc_name'];?> </td>
      </tr>
      <tr>
        <td>Address:</td>
        <td>
          <?php echo $cart['cc_address'];?>
          </td>
      </tr>
      <tr>
        <td>
        </td>
        <td><?php echo $cart['cc_address2'];?> </td>
      </tr>
      <tr>
        <td>
        </td>
        <td>
          <?php echo $cart['cc_city'];?>, <?php echo $cart['cc_state'];?> <?php echo $cart['cc_zip_code'];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>Card:</td>
        <td><?php echo $cart['cc_type'] . " " . $cart['cc_number'] . " " . $cart['cc_code'];?> </td>
      </tr>
      <tr>
        <td>Expiration:</td>
        <td><?php echo $cart['cc_expiration'];?> </td>
      </tr>
      

    </table>
    <?php } ?>

    <div style='clear: both;'>
    </div>
    <br />
    Notes: <br />
    <textarea style='width: 100%;' name='notes'><?php echo $notes; ?></textarea>
    
    <br />
    <br />
    <hr />

    <table id='cart'>
      <th style="width: 180px;"> Shipped - Backorder</th>
      <th style="width: 500px;"> Product </th>
      <th style="width: 100px;"> Price </th>
      <th style="width: 120px;"></th>


      <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
        <tr>
          <td style="text-align: center ">
            <?php $product = product($db, $cart_item['product_id']); ?>
            <?php $product_subtotal = $cart_item['quantity'] * $product['price']; ?>
            <?php $order_total = $order_total + $product_subtotal; ?>

            <input type='text' name='shipped' value='<?php echo $cart_item['quantity']; ?>' size='3' />
             - 
            <input type='text' name='backorder' value='3' size='3' />
            <input type='submit' value='update' />
          </td>
          <td>
            <?php echo $product['name']; ?> <br />
            <?php echo $product['manufacturer']; ?> #<?php echo $product['reference']; ?> 
            <?php if ( !empty($product['collection'])) { echo "<br />Collection: " . $product['collection']; } ?>



            <?php $option_ids = explode(",", $cart_item['options']); ?>

            <? foreach ($option_ids as $option_id) {?>
                <?php $options = $db->query("SELECT option_name, options, price_impact FROM product_options WHERE id='$option_id'")?>
                <?php while ($option = $options->fetch_array(MYSQLI_ASSOC)) { ?>
                  &nbsp; &nbsp; &nbsp; <?php echo $option['option_name'] . ": " . $option['options']; ?>
                <?php } ?>
            <? } ?>

          </td>

          <td style="text-align: right;"><?php echo money_format('%(#10n', $product['price']); ?></td>
          <td style="text-align: right;"><?php echo money_format('%(#10n', $product_subtotal); ?></td>
          <td></td>
        </tr>
      <?php } ?>  
      <tr>

        <td></td>
        <td colspan='2' style='text-align: right;'><?php echo $cart['shipping_type']; ?> Shipping: </td> 
        <td style='text-align: right;'> <input type='text' name='shipping' value='<?php echo $cart['shipping']; ?>' size='15' />
      </tr>
      <tr>

        <td></td>
        <td colspan='2' style='text-align: right;'><?php echo $cart['promotion'] ?> Discount: </td> 
        <td style='text-align: right;'> <input type='text' name='discount' value='<?php echo $cart['discount']; ?>' size='15' />
      </tr>
      <tr>

        <td></td>
        <td></td>
        <td style='text-align: right;'>
          <?php $order_total = $order_total + $cart['shipping']; ?>
          <?php $order_total = $order_total + $cart['discount']; ?>
          Total: 
        </td>
        <td style='text-align: right;'> 
          <?php if ($order_total > 0 ) { echo money_format('%(#10n', $order_total);} ?>
          <input type='hidden' name='total' value='<?php echo $order_total ?>' />
        </td>
      </tr>
    </table>
    <br />
    <div style='width: 100%; text-align: right;'>
    <input type='submit' value='save'> <br />
    <br />
    </div>
  </form>

        



  <div style="clear: both">
  </div>
</div>

<?php include("layout/footer.php"); ?>