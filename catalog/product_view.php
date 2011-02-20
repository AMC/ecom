<div id='update_image'>


    <?php $image = "product_images/" . $product['reference'] . ".jpg"; ?>
    <?php echo resize_popup_img($image, 250); ?><br />
    <?php if ($product['sold_out'] == 1) { ?>
      <img src='images/soldout-250x250.png' /><br />
    <?php } ?>
    (Click to Enlarge)<br /><br />



      <?php $image = "product_images/" . $product['reference']; ?>
      <?php $files = glob( $image . "-*.jpg"); ?>
      <?php $main_image = "product_images/" . $product['reference'] . ".jpg"; ?>
      <?php $tn_image = "product_images/" . $product['reference'] . "-tn.jpg"; ?>
      <?php foreach($files as $file) { ?>
        <?php if ($file != $main_image && $file != $tn_image) { ?>
          <div class='additional_images'>
            <?php echo resize_popup_img($file, 50); ?>
          </div>
        <?php } ?>
      <?php } ?>
    <br /><br />  

</div>

<div id='update_text'>

  <span class='h3'><?php echo $product['name'];?></span> <br /> 
  <span class='h3'> <?php echo money_format('%(#10n', $product['price']); ?> </span>
  <br /><br />
  
  <?php if ($product['sold_out'] == 0) { ?>
  <form action='cart.php' method='post'>
    <input type='submit' class='button' value='Add to Cart' />
    <input type='hidden' name='action' value='add_product' />
    <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
    <input type='hidden' name='quantity' value='1' />
    <input type='hidden' name='price' value='<?php echo $product['price']; ?>' />
    <input type='hidden' name='collection' value='<?php echo $product['collection']; ?> ' />
    <input type='hidden' name='free_shipping' value='<?php echo $product['free_shipping']; ?>'>
  <?php } ?>
  
  
  <br /><br />
  <?php echo $product['manufacturer']; ?> #<?php echo $product['reference']; ?> <br /> <br />
  

  
  <?php $option_names = $db->query("SELECT DISTINCT(option_name) FROM product_options WHERE product_id='$product_id' ORDER BY option_name"); ?>
  <?php while ($option_name = $option_names->fetch_array(MYSQLI_ASSOC)) { ?>
    <?php $current_option_name = $option_name['option_name']; ?>
    <span class='h3'><?php echo $current_option_name; ?>: &nbsp;</span>
    <select name='options[]'> 
    <?php $options = $db->query("SELECT id, options, price_impact FROM product_options WHERE product_id='$product_id' AND option_name='$current_option_name' "); ?>
    <?php while ($option = $options->fetch_array(MYSQLI_ASSOC)) { ?>
      <?php if ($option['price_impact'] == 0) { $price_impact=""; } else { $price_impact= " : +" . $option['price_impact']; }?>
      <?php echo "<option value='" . $option['id'] ."'>" . $option['options'] . " " . $price_impact . "</option>" ; ?>
    <?php } ?>
    </select> <br /><br />
    
  <?php }?>

  </form>

</div>

<div style='clear:both'>
</div>

<div id='product_description'>
  <span class='h3'>Description</span><br />
  <?php echo $product['description']; ?><br /><br />
</div>


