<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<?php $cart_items = $db->query("SELECT product_id, quantity, options FROM cart_products WHERE cart_id='$cart_id'"); ?>
<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>

<div id="container">
  

  
  <div class='split_screen_left h3'>
    
    <h1>Finalize Order # <?php echo $cart_id; ?></h1> <br />
      <?php $cart = $db->query("SELECT name, int_address, address, address2, city, state, zip_code FROM cart WHERE id='$cart_id'"); ?>
      <?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>

    <table>
      <th colspan='2' style='text-align: left;'> Shipping Information: <br /><br /></th>
      <tr>
        <td style='width: 150px'>Name:</td>
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
    <div class='button_div'>
      <a href="checkout.php?action=int_shipping_info" class='button'>edit</a> 
    </div>

  
  </div>
  
  <div class='split_screen_right h3'>
    <?php $cart = $db->query("SELECT email, phone, cc_name, cc_type, cc_number, cc_address, cc_address2, cc_city, cc_state, cc_zip_code FROM cart WHERE id='$cart_id'"); ?>
    <?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
     <table>
       <th colspan='2' style='text-align: left;'> Billing Information: <br /><br /></th>
       <tr>
         <td style='width: 150px;'>Name:</td>
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
     <div class='button_div'>
       <a href="checkout.php?action=int_billing_info" class="button">edit</a> </td>
     </div>

  </div>
  
  <div style='clear: both;'>
  </div>

  <div class='full_screen border_top'>
    <?php include("cart/cart_contents_read_only.php"); ?>
  
    <div class='button_div'>  
      <a class='button' href='cart.php'>edit</a> 
      <a href='checkout.php?action=submit_order' class='button'>Submit Order</a>  
    </div>
    <br /><br />
  </div>  
  
  </div>
  <div style="clear: both;"> </div>
  

  

</div>

<?php include("layout/footer.php"); ?>