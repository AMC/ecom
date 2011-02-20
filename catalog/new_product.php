<div id='update_image'>

 <br /><br /><br /> Images will be added after the product has been created.
  
</div>

<form action='catalog.php' method='POST'>
<input type='hidden' name='action' value='create_product' />


<div id='update_text'>
  <h3>Name</h3>
  <input type='text' class='text' name='name' value='<?php echo $name; ?>'  /><br /><br />
  
  <h3>Price</h3>
  <input type='text' class='text' name='price' value='<?php echo $price; ?>'  /><br /><br />

  <h3>Cost</h3>
  <input type='text' class='text' name='cost' value='<?php echo $cost; ?>'  /><br /><br />

  <h3>Manufacturer</h3>
  <input type='text' class='text' name='manufacturer' value='<?php echo $manufacturer; ?>'  /><br /><br />
  
  <h3>Reference</h3>
  <input type='text' class='text' name='reference' value='<?php echo $reference; ?>'  /><br /><br />
  
  <h3>UPC</h3>
  <input type='text' class='text' name='upc' value='<?php echo $upc; ?>'  /><br /><br />

  <h3>Category</h3>
  <input type='text' class='text' name='category' value='<?php echo $category; ?>'  /><br /><br />
  

  <input type='checkbox' name='discontinued' id='discontinued' value='1'  <?php if ($discontinued == 1) {echo "checked='checked'"; } ?> />
  <label for='discontinued' class='h3'>Discontinued</label><br /><br />
  
  <input type='checkbox' name='sold_out' id='sold_out' value='1'  <?php if ($sold_out == 1) {echo "checked='checked'"; } ?> />
  <label for='sold_out' class='h3'>Sold Out</label><br /><br />
  
  
</div>

<div style='clear: both;'>
</div>

<div>
  <span class='h3'>Description</span><br />
  <textarea name='description' class='text text_area'><?php echo $description; ?></textarea> <br /><br />
</div>

<div class='button_div'>
  <input type='submit' value='create' class='button' /> <br /><br />
</div>



</form>