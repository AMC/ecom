<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $cart = $db->query("SELECT name, email, phone, address, address2, city, state, zip_code FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>

<?php $variables = array ('name', 'email', 'phone', 'address', 'address2', 'city', 'state', 'zip_code'); ?>
<?php foreach ($variables as $value) { ?>
  <?php if (empty($$value)) { $$value = $cart[$value]; } ?>
<?php } ?>

<div id="container">

  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

  <form action='checkout.php' method='POST' >
    <h3> Shipping Information: </h3>
    <br />
    <?php $hs = $db->query("SELECT display, name, ground, third_day, second_day, next_day FROM holiday_shipping"); ?>
    <?php $hs = $hs->fetch_array(MYSQLI_ASSOC); ?>

    <?php if ($hs['display'] == 1) { ?>
    <table>
      <tr>
        <td colspan='2' style='font-weight: bold'>
          <em>To be sure your package arrives by <?php echo $hs['name']; ?> please see delivery schedule:</em>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 20px;'>
          UPS Ground
        </td>
        <td>
          Order by noon <?php echo date( "D F j" ,strtotime($hs['ground'])); ?>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 20px;'>
          UPS Third Day
        </td>
        <td>
          Order by noon <?php echo date( "D F j" ,strtotime($hs['third_day'])); ?>     
        </td>
      </tr>
      <tr>
        <td style='padding-left: 20px;'>
          2nd Day Air
        </td>
        <td>
          Order by noon <?php echo date( "D F j" ,strtotime($hs['second_day'])); ?>
        </td>
      </tr>
      <tr>
        <td style='padding-left: 20px;'>
          Next Day Air
        </td>
        <td>
          Order by noon <?php echo date( "D F j" ,strtotime($hs['next_day'])); ?>
        </td>
      </tr>
    </table>
    <br />
    <?php } ?>




    Shipping Method:<br />
    <?php $cart_id = cart_id($db); ?>
    <?php $subtotal_shipping = 0; ?>
    <?php $subtotal_free_shipping = 0; ?>
    <?php $prev_max = 0; ?>
    <?php $cart_items = $db->query("SELECT * FROM cart_products WHERE cart_id=$cart_id"); ?>

    <?php while ($product = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
      <?php $subtotal_shipping += ( $product['price'] * $product['quantity'] ); ?>
      <?php if ($product['free_shipping'] == FALSE) { $subtotal_free_shipping += ( $product['price'] * $product['quantity'] ); } ?>

    <?php } ?>
    
    <?php $shipping_tiers = $db->query("SELECT * FROM shipping ORDER BY tier;"); ?>
    
    <?php while ($shipping = $shipping_tiers->fetch_array(MYSQLI_ASSOC)) { ?>
      <?php if ($subtotal_free_shipping == 0) { ?>
        <?php $ground = 0; ?>
      <?php } elseif ($subtotal_shipping > $prev_max && $subtotal_shipping < $shipping['max_amt']) { ?>
        <?php $ground = $shipping['ground']; ?>
      <?php }?>
      
      <?php if ($subtotal_shipping > $prev_max && $subtotal_shipping < $shipping['max_amt']) { ?>
      
        <?php $third_day = $shipping['third_day']; ?>
        <?php $second_day = $shipping['second_day']; ?>
        <?php $next_day = $shipping['next_day']; ?>
      <?php } ?>
      
      <? $prev_max = $shipping['max_amt']; ?>
      
    <?php } ?>

    
      <select name='shipping'>
        <option value='<?php echo "GR $ground"; ?>'><?php echo money_format('%(#10n', $ground);?>: Ground*</option>
        <option value='<?php echo "TH $third_day"; ?>'><?php echo money_format('%(#10n', $third_day);?>: 3rd Day*</option>
        <option value='<?php echo "SC $second_day"; ?>'><?php echo money_format('%(#10n', $second_day);?>: 2nd Day*</option>
        <option value='<?php echo "ND $next_day"; ?>'><?php echo money_format('%(#10n', $next_day);?>: Next Day*</option>
      </select>
    <br />  <br />

    Name: <br />
    <input type='text' name='name' size='30' value='<?php echo $name; ?>' /><br />

    Address: <br />
    <input type='text' name='address' size='30' value='<?php echo $address; ?>' /><br />
    Address: <br />
    <input type='text' name='address2' size='30' value='<?php echo $address2; ?>' /><br />

    City: <br />
    <input type='text' name='city' size='30' value='<?php echo $city; ?>' /> <br />
    State: <br />
    <?php state('state', $state);?><br />
    Zip Code: <br />
    <input type='text' name='zip_code' size='5' value='<?php echo $zip_code; ?>' /><br />
    <br />
    Your order will not be processed until you finalize the order on the next page. <br />
    <br />
    <a href='checkout.php?action=billing_info' class='button'>back</a> 
    <input type='hidden' name='action' value='verify_shipping_info'>
    <input type='submit' class='button' value='next' />
  </form>
  
  <br />
  <div style='font-style: italic; width: 300px;'>
    *Air package freight costs are estimates only. <br />
    If the actual cost is greater, you will be charged for the difference and emailed an updated total.
  </div>
  
  <br /><br />
  
  </div>
  
  <div class='content_bottom'>
  </div>


  <div style="clear: both">
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>