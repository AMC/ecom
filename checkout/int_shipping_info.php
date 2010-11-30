<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $cart = $db->query("SELECT name, email, phone, int_address FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>

<?php $variables = array ('name', 'email', 'phone', 'int_address'); ?>
<?php foreach ($variables as $value) { ?>
  <?php if (empty($$value)) { $$value = $cart[$value]; } ?>
<?php } ?>

<div id="container">

  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

  <form action='checkout.php' method='POST' >
    <h3> Shipping Information: </h3>
    Shipping Method:<br />
    
    For all International Orders, we will contact you to <br />
    finalize shipping methods.
    <br />
    <br />

    Name: <br />
    <input type='text' name='name' size='30' value='<?php echo $name; ?>' /><br />
    Email: <br />
    <input type='text' name='email' size='30' value='<?php echo $email; ?>' /><br />
    Phone: <br />
    <input type='text' name='phone' size='30' value='<?php echo $phone; ?>' /><br />
    Address: <br />
    <textarea name='int_address' cols='30' rows='5'><?php echo $int_address;?></textarea>
    <br />
    You will not be charged until you finalize the order on the next page. <br />
    <br />
    <a href='checkout.php?action=billing_info' class='button'>back</a> 
    <input type='hidden' name='action' value='verify_int_shipping_info'>
    <input type='submit' class='button' value='next' />
  </form>
  
  <br />
  <div style='font-style: italic; width: 300px;'>

  </div>
  
  <br /><br />
  
  </div>
  
  <div class='content_bottom'>
  </div>


  <div style="clear: both">
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>