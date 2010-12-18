<div id='update_image'>

  Main Image (click to enlarge) <br />
  <?php $main_image = "product_images/" . $product['reference'] . ".jpg"; ?>
  <?php echo resize_popup_img($main_image, 200); ?>
  <br /><br />

  <form action='catalog.php' enctype="multipart/form-data" method='POST'>
    <input type='hidden' name='action' value='update_image' />
    <input type='file' name='image' size='15' />
    <input type='hidden' name='reference' value='<?php echo $product['reference']; ?>' />
    <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
    <input type='hidden' name='type' value='main' />
    <input type='submit' value='update' class='button'>
    
  </form>
  <br /><br />


  Thumbnail <br />
  <?php $tn_image = "product_images/" . $product['reference'] . "-tn.jpg"; ?>
  <?php echo resize_popup_img($tn_image, 125); ?>
  <br /><br />

  <form action='catalog.php' enctype="multipart/form-data" method='POST'>
    <input type='hidden' name='action' value='update_image' />
    <input type='file' name='image' size='15' />
    <input type='hidden' name='reference' value='<?php echo $product['reference']; ?>' />
    <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
    <input type='hidden' name='type' value='thumbnail' />
    <input type='submit' value='update' class='button' />
  </form>
  <br /><br />

  Additional Images <br />  
  <div style='text-align: left;'>
    <?php $image = "product_images/" . $product['reference']; ?>
    <?php $files = glob( $image . "-*.jpg"); ?>
    <?php foreach($files as $file) { ?>
      <?php if ($file != $main_image && $file != $tn_image) { ?>
        <div class='additional_images'>
            <?php $delete = str_replace('product_images/', '', $file); ?>
            <?php echo "<a href='catalog.php?action=delete_image&image=" . $delete . "&product_id=" . $product_id . "'>[delete]</a>"; ?> <br />
            <?php echo resize_popup_img($file, 50); ?> 
        </div>
      <?php } ?>
    <?php } ?>
  </div>
  
  <div style='margin-top: 10px; clear: both'>
    <br />
    <form action='catalog.php' enctype="multipart/form-data" method='POST'>
      <input type='hidden' name='action' value='update_image' />
      <input type='file' name='image' size='15' />
      <input type='hidden' name='reference' value='<?php echo $product['reference']; ?>' />
      <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
      <input type='hidden' name='type' value='additional_images' />
      <input type='submit' value='update' class='button' />
    </form>
    <br /><br />
  </div>
  
</div>

<form action='catalog.php' method='POST'>
  <input type='hidden' name='action' value='update_product' />
  <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />

  <div id='update_text'>
    <h3>Name</h3>
    <input type='text' name='name' class='text' value='<?php echo $product['name']; ?>' size='40' /><br /><br />
  
    <h3>Quantity</h3>
    <input type='text' name='quantity' class='text' value='<?php echo $product['quantity']; ?>' size='40' /> <br /><br />
  
    <h3>Price</h3>
    <input type='text' name='price' class='text' value='<?php echo $product['price']; ?>' size='40' /><br /><br />

    <h3>Cost</h3>
    <input type='text' name='cost' class='text' value='<?php echo $product['cost']; ?>' size='40' /><br /><br />

    <h3>Weight</h3>
    <input type='text' name='weight' class='text' value='<?php echo $product['weight']; ?>' size='40' /><br /><br />

    <h3>Manufacturer</h3>
    <input type='text' name='manufacturer' class='text' value='<?php echo $product['manufacturer']; ?>' size='40' /><br /><br />
  
    <h3>Reference</h3>
    <input type='text' name='reference' class='text' value='<?php echo $product['reference']; ?>' size='40' /><br /><br />
  
    <h3>UPC</h3>
    <input type='text' name='upc' class='text' value='<?php echo $product['upc']; ?>' size='40' /><br /><br />
  
    <h3>Category</h3>
    <input type='text' name='category' class='text' value='<?php echo $product['category']; ?>' size='40' /><br /><br />
  
    <span class='h3'>Discontinued</span>
    <input type='checkbox' name='discontinued' value='1' size='40' <?php if ($product['discontinued'] == 1) {echo "checked='checked'"; } ?> /><br /><br />


  </div>
  <div style='clear: both;'>
  </div>

  <div>
    <span class='h3'>Description</span><br />
    <textarea name='description' class='text text_area'><?php echo $product['description']; ?></textarea> <br /><br />
  </div>

  <div class='button_div'>
    <input type='submit' value='update' class='button' /> <br /><br />
  </div>
</form>

<div>
<h3 style='text-align: center;'>Options</h3>
<div style='width: 100%; text-align: center;'>
  *** All options with the same option name will be grouped together in the user view ***
</div>
<table style='width:100%; border: 1px solid #DDD; margin-bottom: 20px;'>
  <th style='text-align: center'>option name</th>
  <th style='text-align: center'>option</th>
  <th style='text-align: center'>price impact</th>
  <th></th>
  

  <form action='catalog.php' method='post'>
  <tr style='text-align: center;'>
    <td>  
     <input type='text' class='text short_text' name='option_name' size='15' />
    </td>
    <td>
      <input type='text' class='text short_text' name='option' size='15' />
    </td>
    <td>
      <input type='text' class='text short_text' name='price_impact' size='10' style='text-align: right;' />
    <td>
      <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
      <input type='hidden' name='action' value='new_option' />
      <input type='submit' value='add option' class='button' / >
    </td>
  </tr>
  </form>

  <?php $options = $db->query("SELECT id, option_name, options, price_impact FROM product_options WHERE product_id='$product_id' ORDER BY option_name"); ?>
  <?php while ($option = $options->fetch_array(MYSQLI_ASSOC)) { ?>

    <form action='catalog.php' method='post'>
    <tr style='text-align: center'>
      <td>  
       <input type='text' name='option_name' class='text short_text' value='<?php echo $option['option_name']; ?>' />
      </td>
      <td>
        <input type='text' name='option' class='text short_text' value='<?php echo $option['options']; ?>' />
      </td>
      <td>
        <input type='text' name='price_impact' class='text short_text' style='text-align: right;' value='<?php echo $option['price_impact']; ?>'  />
      <td>
        <input type='hidden' name='option_id' value='<?php echo $option['id']; ?>' />
        <input type='hidden' name='product_id' value='<?php echo $product_id; ?>' />
        <input type='hidden' name='action' value='update_option' />
        <input type='submit' value='update' class='button' / >
        <a href='catalog.php?action=delete_option&product_id=<?php echo $product_id; ?>&option_id=<?php echo $option['id']; ?>' class='button'>delete</a>
      </td>
      
    </tr>
    </form>

  <?php }?>
  </table>
</div>