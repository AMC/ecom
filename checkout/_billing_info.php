<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<?php $cart = $db->query("SELECT cc_name, cc_address, cc_address2, cc_city, cc_state, cc_zip_code FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>


<?php $variables = array ('cc_name', 'cc_address', 'cc_address2', 'cc_city', 'cc_state', 'cc_zip_code'); ?>
<?php foreach ($variables as $value) { ?>
  <?php if (empty($$value)) { $$value = $cart[$value]; } ?>
<?php } ?>

<div id="container">
  
  <div class='split_screen_left h3'>

    <form action='checkout.php' method='POST' >

    <h3> Billing Information: </h3>
    <br />
  
    Email: <br />
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE && empty($email)) { ?>
      <input type='text' name='email' class='text' value='<?php echo $_SESSION['user']['email']; ?>' />
    <?php } else { ?>
    <input type='text' name='email' class='text' value='<?php echo $email; ?>' />
    <?php } ?>
    <br /><br />

    Phone: <br />
    <input type='text' name='phone' class='text' value='<?php echo $phone; ?>' /><br /><br />
  
  
    Name on Card: <br />
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE && empty($cc_name)) { ?>
      <?php $user_name =  $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name']; ?>
      <input type='text' name='cc_name' class='text' value='<?php echo $user_name; ?>' /> 
    <?php } else { ?>
      <input type='text' name='cc_name' class='text' value='<?php echo $cc_name; ?>' /> 
    <?php } ?>
    <br /><br />
    Card Number: <br />
    <input type='text' name='cc_number' class='text' value='' /> <br /><br />
    Security Code: <br />
    <input type='text' name='cc_code' class='text' value='' maxlength='4' /> <br /><br />
    Expiration: <br />
    <?php month('cc_month', $cc_month); year('cc_year', $cc_year); ?> <br /><br />

    Address: <br />
    <input type='text' name='cc_address' class='text' value='<?php echo $cc_address; ?>' /> <br /><br />
    Address: <br />
    <input type='text' name='cc_address2' class='text' value='<?php echo $cc_address2; ?>' /> <br /><br />
    City: <br />
    <input type='text' name='cc_city' class='text' value='<?php echo $cc_city; ?>' /> <br /><br />
    State: <br />
    <?php state('cc_state', $cc_state);?><br /><br />
    Zip Code: <br />
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE && empty($cc_zip_code)) { ?>
      <input type='text' name='cc_zip_code' class='text' value='<?php echo $_SESSION['user']['zip_code']; ?>' />
    <?php } else { ?>
      <input type='text' name='cc_zip_code' class='text' value='<?php echo $cc_zip_code; ?>' />
    <?php } ?>
    <br /><br />
    <input type='checkbox' name='shipping_same_as_billing' value='true' checked='checked'> Shipping address is the same as billing address </checkbox> 
    <br /><br />
  
    <div class='button_div'>
      <input type='hidden' name='action' value='verify_billing_info'>
      <input type='submit' class='button' value='next' />
    </div>
    
    </form>
    <br />
  
  </div>

  <div style="clear: both">
  </div>
  


  
</div>

<?php include("layout/footer.php"); ?>