<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $cart = $db->query("SELECT cc_name, cc_address, cc_address2, cc_city, cc_state, cc_zip_code FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>


<?php $variables = array ('cc_name', 'cc_address', 'cc_address2', 'cc_city', 'cc_state', 'cc_zip_code'); ?>
<?php foreach ($variables as $value) { ?>
  <?php if (empty($$value)) { $$value = $cart[$value]; } ?>
<?php } ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

  <form action='checkout.php' method='POST' >

  <h3> Billing Information: </h3>
  <br />
  <a class='button' href='checkout.php?action=int_billing_info'>Click here for International Orders</a><br /><br />
  
  Email: <br />
  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE && empty($email)) { ?>
    <input type='text' name='email' size='30' value='<?php echo $_SESSION['user']['email']; ?>' /><br />
  <?php } else { ?>
  <input type='text' name='email' size='30' value='<?php echo $email; ?>' /><br />
  <?php } ?>

  Phone: <br />
  <input type='text' name='phone' size='30' value='<?php echo $phone; ?>' /><br />
  
  
  Name on Card: <br />
  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE && empty($cc_name)) { ?>
    <?php $user_name =  $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name']; ?>
    <input type='text' name='cc_name' size='30' value='<?php echo $user_name; ?>' /> <br />
  <?php } else { ?>
    <input type='text' name='cc_name' size='30' value='<?php echo $cc_name; ?>' /> <br />
  <?php } ?>
  Card Number: <br />
  <input type='text' name='cc_number' size='30' value='' /> <br />
  Security Code: <br />
  <input type='text' name='cc_code' size='4' value='' maxlength='4' /> <br />
  Expiration: <br />
  <?php month('cc_month', $cc_month); year('cc_year', $cc_year); ?> <br />  
  <br />
  Address: <br />
  <input type='text' name='cc_address' size='30' value='<?php echo $cc_address; ?>' /> <br />
  Address: <br />
  <input type='text' name='cc_address2' size='30' value='<?php echo $cc_address2; ?>' /> <br />
  City: <br />
  <input type='text' name='cc_city' size='30' value='<?php echo $cc_city; ?>' /> <br />
  State: <br />
  <?php state('cc_state', $cc_state);?><br />
  Zip Code: <br />
  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE && empty($cc_zip_code)) { ?>
    <input type='text' name='cc_zip_code' size='5' value='<?php echo $_SESSION['user']['zip_code']; ?>' /><br />
  <?php } else { ?>
    <input type='text' name='cc_zip_code' size='5' value='<?php echo $cc_zip_code; ?>' /><br />
  <?php } ?>
  <input type='checkbox' name='shipping_same_as_billing' value='true' checked='checked'> Shipping address is the same as billing address </checkbox> 
  <br />
  <input type='hidden' name='action' value='verify_billing_info'>
  
  <br />
  <input type='submit' class='button' value='next' />
  
  </form>
  <br />
  
  </div>
  
  <div class='content_bottom'>
  </div>

  <div style="clear: both">
  </div>
  


  
</div>

<?php include("layout/_layout_bottom.php"); ?>