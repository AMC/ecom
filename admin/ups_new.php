<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id="container">
  <h3> Create UPS Label for Order #<?php echo $cart_id; ?> </h3>

  <?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
  <?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
  
  <form action='admin.php' method='post'>
    <table id='shipping' >
      <th colspan=2>Ship To:</th>
      
      <tr>
        <td>
          Name:
        </td>
        <td>
          <input type='text' name='ups_name' size='50' value="<?php echo $cart['name']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Phone: 
        </td>
        <td>
          <input type='text' name='ups_phone' size='50' value="<?php echo $cart['phone']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Address:
        </td>
        <td>
          <input type='text' name='ups_address' size='50' value="<?php echo $cart['address']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Address:
        </td>
        <td>
          <input type='text' name='ups_address2' size='50' value="<?php echo $cart['address2']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          City: 
        </td>
        <td>
          <input type='text' name='ups_city' size='50' value="<?php echo $cart['city']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          State:
        </td>
        <td>
          <input type='text' name='ups_state' size='50' value="<?php echo $cart['state']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Zip:
        </td>
        <td>
          <input type='text' name='ups_zip' size='50' value="<?php echo $cart['zip_code']; ?>" /> 
        </td>
      </tr>
      <th colspan=2>Package Information</th>
      
      <tr>
        <td>
          Service: 
        </td>
        <td>
          <? $options = array('03' => 'Ground', '12' => 'Third Day', '02' => 'Second Day', '01' => 'Next Day'); ?>
          <select name='ups_service'> 
            <?php foreach ($options as $key => $option) { ?>
              <?php if ($option == $cart['shipping_type']) { ?>
                <?php echo "<option value='$key' selected=selected>$option</option>"; ?>
              <?php } else { ?>
                <?php echo "<option value='$key'>$option</option>"; ?>
              <?php } ?>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          Length: 
        </td>
        <td>
          <input type='text' name='package_length' size='50' value="<?php echo $package_length; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Width: 
        </td>
        <td>
          <input type='text' name='package_width' size='50' value="<?php echo $package_width; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Height: 
        </td>
        <td>
          <input type='text' name='package_height' size='50' value="<?php echo $package_height; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Weight: 
        </td>
        <td>
          <input type='text' name='package_weight' size='50' value="<?php echo $package_weight; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          Insure Value: 
        </td>
        <td>
          <input type='text' name='package_value' size='50' value="<?php echo $cart['total'] - $cart['shipping']; ?>" /> 
        </td>
      </tr>
      <tr>
        <td>
          
        </td>
        <td style='text-align: right'>
          <input type='hidden' name='action' value='ups_create' />
          <input type='hidden' name='ups_invoice' value='<?php echo $cart_id; ?>' />
          <input type='submit' value='Generate Label' />
        </td>
      </tr>
    
    
    
  </form>
  </table>
  


  <div style="clear: both"></div>
</div>

<?php include("layout/footer.php"); ?>