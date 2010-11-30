<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $cart_items = $db->query("SELECT product_id, quantity, options FROM cart_products WHERE cart_id='$cart_id'"); ?>
<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>
    
  <h3>Finalize Order # <?php echo $cart_id; ?></h3> <br />
  <?php show_shipping_info($db, $cart_id); ?>
  
  <?php show_billing_info($db, $cart_id); ?>
  
  <div style='clear: both;'>
  </div>
    
  <hr />
  <br />

  <a class='button' href='cart.php'>edit</a>
  <?php include("cart/cart_contents_read_only.php"); ?>
  
  <div style='text-align: right; width: 100%;'>  
    <a href='checkout.php?action=submit_order' class='button'>Submit Order</a>  
  </div>
  <br /><br />
  
  
  </div>
  <div style="clear: both;"> </div>
  
  <div class='content_bottom'> </div>
  

</div>

<?php include("layout/_layout_bottom.php"); ?>