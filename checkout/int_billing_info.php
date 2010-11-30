<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $cart = $db->query("SELECT cc_name, cc_int_address FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>


<?php $variables = array ('cc_name', 'cc_int_address'); ?>
<?php foreach ($variables as $value) { ?>
  <?php if (empty($$value)) { $$value = $cart[$value]; } ?>
<?php } ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

  <form action='checkout.php' method='POST' >

  <h3> Billing Information: </h3>
  <a class='button' href='checkout.php?action=billing_info'>Click here for US Orders</a><br /><br />
  Name on Card: <br />
  <input type='text' name='cc_name' size='30' value='<?php echo $cc_name; ?>' /> <br />
  Card Number: <br />
  <input type='text' name='cc_number' size='30' value='' /> <br />
  Security Code: <br />
  <input type='text' name='cc_code' size='4' value='' maxlength='4' /> <br />
  Expiration: <br />
  <?php month('cc_month', $cc_month); year('cc_year', $cc_year); ?> <br />  
  <br />
  Address: <br />
  <textarea name='cc_int_address' cols='30' rows='5'><?php echo $int_address;?></textarea>
  <br /><br />
  
  <input type='checkbox' name='shipping_same_as_billing' value='true' checked='checked'> Shipping address is the same as billing address </checkbox> 
  <br />
  <input type='hidden' name='action' value='verify_int_billing_info'>
  
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