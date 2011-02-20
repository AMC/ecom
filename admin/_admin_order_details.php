
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>


<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
<?php $order_total = 0; ?>


<div id="container">
  <h3> Order #<?php echo $cart['id']; ?> </h3>
  
  Today is: <?php echo date("F j, Y"); ?>
  <br /><br />
  
  <?php if ($cart['tracking_number'] == ''  ) { ?>
  <form action='admin.php' method='post'>
    <input type='hidden' name='action' value='ups_new'>
    <input type='hidden' name='cart_id' value='<?php echo $cart_id; ?>' />
    <input type='submit' value='Create UPS Label'>
  </form>
  <br />
  <?php } else { ?>
    <?php echo "Tracking Number: " . $cart['tracking_number']; ?>
  <br /><br />
  <?php } ?>
  
  <form action='admin.php' method='POST'>
  <input type='hidden' name='action' value='order_update_shipping' />
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
    
 

    <div style='clear: both;'>
    </div>
    <br />
    Notes: <br />
    <textarea style='width: 100%;' name='notes'><?php echo $notes; ?></textarea>
    <br /> <br />
      <div style='width: 100%; text-align: right;'>
      <input type='submit' value='save'> <br />
      </div>
    </form>
    
    <br />
    <hr />
    
    <?php $subtotal_products = 0; ?>

    <?php $carts = $db->query("SELECT shipping, shipping_type, tax, promotion, discount_code, discount, total FROM cart WHERE id = $cart_id "); ?>
    <?php $cart = $carts->fetch_array(MYSQLI_ASSOC); ?>

    <br />
    
    <?php $cart_items = $db->query("SELECT products.id, products.name, products.reference, cart_products.quantity, cart_products.shipped, cart_products.price, cart_products.options FROM cart_products, products WHERE cart_id='$cart_id' AND cart_products.product_id = products.id"); ?>

    <table id='cart'>
      <th style="width: 50px;">Order</th>
      <th style="width: 130px;">Shipped</th>
      <th style="width: 400px;">Product</th>
      <th style="width: 100px;">Price</th>
      <th style="width: 100px;">Subtotal</th>
      <th style='width: 100px;'></th>


           <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>

              <tr>
                <td style="text-align: center ">
                  <?php echo $cart_item['quantity']; ?>
                </td>
                <td style="text-align: center ">
                  <form action='admin.php' method='post'>
                  <input type='hidden' name='action' value='partial_order_update' />
                  <input type='hidden' name='cart_id' value='<?php echo $cart_id; ?>' />
                  <input type='hidden' name='product_id' value="<?php echo $cart_item['id'];?>">
                  <input type='text' name='shipped' size=2 value="<?php echo $cart_item['shipped']; ?>" />
                  <input type='submit' value='update' />
                  </form>
                </td>

                <td>
                  <?php echo $cart_item['name']; ?> 
                  #<?php echo $cart_item['reference']; ?>
                  <br />
                  <?php $option_ids = explode(",", $cart_item['options']); ?>

                  <? foreach ($option_ids as $option_id) {?>
                    <?php $options = $db->query("SELECT option_name, options, price_impact FROM product_options WHERE id='$option_id'")?>
                    <?php while ($option = $options->fetch_array(MYSQLI_ASSOC)) { ?>
                    <?php if ( $option['price_impact'] == 0 ) { $price_impact = ""; } else {$price_impact = " + " . $option['price_impact'];} ?>
                      <?php echo " " . $option['options'] . $price_impact ?>

                    <?php } ?>
                  <? } ?>  
                </td>

                <td style="text-align: right;">
                  <?php echo money_format('%(#10n', $cart_item['price']); ?>
                </td>

                <td style="text-align: right;">
                  <?php echo money_format('%(#10n', $cart_item['price'] * $cart_item['quantity'] ); ?>
                </td>

                <td style='text-align: right;'>
                  &nbsp;
                </td>

              </tr>

            <?php } ?>  
            <tr>
              <td colspan=6>&nbsp;</td>
            </tr>

<form action='admin.php' method='POST'>
<input type='hidden' name='action' value='order_update_costs' />
<input type='hidden' name='cart_id' value='<?php echo $cart_id?>' />


            <tr>
              <td></td>
              <td colspan='4' style='text-align: right;'><?php echo $cart['promotion']; ?> Discount: </td>
              <td style='text-align: right;'>
                <input type='text' name='discount' size=10 value="<?php echo $cart['discount']; ?>" style='text-align: right' />
            </tr>


            <tr>
              <td></td>
              <td colspan='4' style='text-align: right;'><?php echo $cart['shipping_type']; ?> Shipping: </td>
              <td style='text-align: right;'> 
                <?php if (empty($_SESSION['international'])) { ?>
                  <input type='text' name='shipping' size=10 value="<?php echo $cart['shipping']; ?>" style='text-align: right' />
                <?php } else { ?>
                  TBD
                <?php } ?>
              </td>
            </tr>

            <tr>
              <td></td>
              <td colspan='4' style='text-align: right;'>Sales Tax: </td>
              <td style='text-align: right;'> 
                <input type='text' name='tax' size=10 value="<?php echo $cart['tax']; ?>" style='text-align: right' />
              </td>
            </tr>


            <tr>
              <td></td>
              <td colspan='4' style='text-align: right;'>Total: </td>
              <td style='text-align: right;'> 

                <?php echo money_format('%(#10n', $cart['total']); ?>

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