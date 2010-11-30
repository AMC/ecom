<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<?php $cart = $db->query("SELECT name, email, phone, address, address2, city, state, zip_code FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>

<?php $variables = array ('name', 'email', 'phone', 'address', 'address2', 'city', 'state', 'zip_code'); ?>
<?php foreach ($variables as $value) { ?>
  <?php if (empty($$value)) { $$value = $cart[$value]; } ?>
<?php } ?>

<div id="container">

  <div class='split_screen_left h3'>

    <form action='checkout.php' method='POST' >
      <h1> Shipping Information: </h1>
      <br />
    
      Shipping Method:<br />
      <?php $cart_id = cart_id($db); ?>
      <?php $ground = 9.99; $third_day = 19.99; $second_day = 29.99; $next_day = 35.99; ?>
    
    
        <select name='shipping'>
          <option value='<?php echo "GR $ground"; ?>'><?php echo money_format('%(#10n', $ground);?>: Ground*</option>
          <option value='<?php echo "TH $third_day"; ?>'><?php echo money_format('%(#10n', $third_day);?>: 3rd Day*</option>
          <option value='<?php echo "SC $second_day"; ?>'><?php echo money_format('%(#10n', $second_day);?>: 2nd Day*</option>
          <option value='<?php echo "ND $next_day"; ?>'><?php echo money_format('%(#10n', $next_day);?>: Next Day*</option>
        </select>
      <br />  <br />

      Name: <br />
      <input type='text' name='name' class='text' value='<?php echo $name; ?>' /><br /><br />

      Address: <br />
      <input type='text' name='address' class='text' value='<?php echo $address; ?>' /><br /><br />
      Address: <br />
      <input type='text' name='address2' class='text' value='<?php echo $address2; ?>' /><br /><br />

      City: <br />
      <input type='text' name='city' class='text' value='<?php echo $city; ?>' /> <br /><br />
      State: <br />
      <?php state('state', $state);?><br /><br />
      Zip Code: <br />
      <input type='text' name='zip_code' class='text' value='<?php echo $zip_code; ?>' /><br /><br />
      <br />
      Your order will not be processed until you finalize the order on the next page. <br /><br />
      <br />

      <div class='button_div'>
        <a href='checkout.php?action=billing_info' class='button'>back</a> 
        <input type='hidden' name='action' value='verify_shipping_info'>
        <input type='submit' class='button' value='next' />
      </div>
    </form>
  
  
  </div>



  <div style="clear: both">
  </div>
</div>

<?php include("layout/footer.php"); ?>