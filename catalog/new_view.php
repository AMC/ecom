<div id='update_image'>

 <br /><br /><br /> Images will be added after the product has been created.
  
</div>

<form action='catalog.php' method='POST'>
<input type='hidden' name='action' value='create_product' />


<div id='update_text'>
  <h3>Name</h3>
  <input type='text' name='name' value='<?php echo $name; ?>' size='40' /><br /><br />
  
  <h3>Price</h3>
  <input type='text' name='price' value='<?php echo $price; ?>' size='40' /><br /><br />

  <h3>Wholesale Price</h3>
  <input type='text' name='ws_price' value='<?php echo $ws_price; ?>' size='40' /><br /><br />

  <h3>Manufacturer</h3>
  <input type='text' name='manufacturer' value='<?php echo $manufacturer; ?>' size='40' /><br /><br />
  
  <h3>Reference</h3>
  <input type='text' name='manufacturer_reference' value='<?php echo $manufacturer_reference; ?>' size='40' /><br /><br />
  
  <h3>UPC</h3>
  <input type='text' name='upc' value='<?php echo $upc; ?>' size='40' /><br /><br />

  <h3>Parent Category</h3>
  <select name='parent_category'>
  <?php $select_options = array('','Accessories', 'Decor', 'Hats', 'Kids')?>
  <?php foreach ($select_options as $select_option) { ?>
      <?php if ($parent_category == $select_option) { ?>
        <?php echo "<option selected='selected'>$select_option</option>"?>
      <?php } else { ?>
        <?php echo "<option>$select_option</option>"?>
      <?php } ?>
   <?php } ?>
  </select>
  <br /><br />
  
  <h3>Category</h3>
  <input type='text' name='category' value='<?php echo $category; ?>' size='40' /><br /><br />
  
  <h3>Collection</h3>
  <input type='text' name='collection' value='<?php echo $collection; ?>' size='40' /><br /><br />

  <h3>Dimensions</h3>
  <input type='text' name='dimensions' value='<?php echo $dimensions; ?>' size='40' /><br /><br />

  <h3>Strap Length</h3>
  <input type='text' name='strap_length' value='<?php echo $strap_length; ?>' size='40' /><br /><br />

  <span class='h3'>Free Shipping</span>
  <input type='checkbox' name='free_shipping' value='1' size='40' <?php if ($free_shipping == 1) {echo "checked='checked'"; } ?> /><br /><br />

  <span class='h3'>Discontinued</span>
<input type='checkbox' name='discontinued' value='1' size='40' <?php if ($discontinued == 1) {echo "checked='checked'"; } ?> /><br /><br />


</div>

<div id='update_description'>
  <textarea name='description' style='width: 100%;'><?php echo $description; ?></textarea> <br /><br />
  <input type='submit' value='create' /> <br /><br />
</div>



</form>