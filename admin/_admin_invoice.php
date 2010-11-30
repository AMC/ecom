<?php $stylesheets[] = 'invoice.css'; ?>


<?php $cart_items = $db->query("SELECT product_id, quantity, options FROM cart_products WHERE cart_id='$cart_id'"); ?>
<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
<?php $order_total = 0; ?>

<div id="container">
  <h3>Customer Invoice for Order #<?php echo $cart_id; ?></h3>

  <table id="shipping" style='width: 45%; float: left'>
    <th colspan='2' style='text-align: left;'> Shipping Information: </th>
    <tr>
      <td>Name:</td>
      <td><?php echo $cart['name'];?> </td>
    </tr>
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

  </table>  

  <table id="billing" style='width: 45%; float: right'>
    <th colspan='2' style='text-align: left;'> Billing Information: </th>
    <tr>
      <td>Name:</td>
      <td><?php echo $cart['cc_name'];?> </td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td><?php echo $cart['phone'];?> </td>
    </tr>

    <tr>
      <td>Email:</td>
      <td><?php echo $cart['email'];?> </td>
    </tr>
    <tr>
      <td>Address:</td>
      <td>
        <?php echo $cart['cc_address'];?>
        </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <td>
      </td>
      <td><?php echo $cart['cc_address2'];?> </td>
    </tr>
    <tr>
      <td> City, State, Zip
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
    

  </table>

        
  <div style='clear: both;'>
  </div>
    
  <hr />
  
  
    <table id='cart'>
      <th style="width: 180px;"> Quantity </th>
      <th style="width: 500px;"> Product </th>
      <th style="width: 100px;"> Price </th>
      <th style="width: 120px;"></th>


      <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
        <tr>
          <td style="text-align: center ">
            <?php $product = product($db, $cart_item['product_id']); ?>
            <?php $product_subtotal = $cart_item['quantity'] * $product['price']; ?>
            <?php $order_total = $order_total + $product_subtotal; ?>

            <?php echo $cart_item['quantity']; ?>
          </td>
          <td>
            <?php echo $product['name']; ?> <br />
            <?php echo $product['manufacturer']; ?> #<?php echo $product['manufacturer_reference']; ?> 
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
        <td colspan ='2' style='text-align: right;'><?php echo $cart['shipping_type']; ?> Shipping: </td> 
        <td style='text-align: right;'> <?php echo $cart['shipping']; ?> </td>
      </tr>
      <tr>

        <td></td>
        <td colspan='2' style='text-align: right;'><?php echo $cart['promotion'] ?> Discount: </td> 
        <td style='text-align: right;'> <?php echo $cart['discount']; ?> </td>
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
          <?php echo money_format('%(#10n', $order_total); ?>

        </td>
      </tr>
    </table>


  <div style="clear: both">
  </div>
</div>

