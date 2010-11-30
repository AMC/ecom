<div id='other_items'>
  <?php if (empty($collection)) { $collection = $product['collection']; } ?>
  <?php if (empty($parent)) { $parent=0; }?>
  <?php if (empty($expand)) { $expand=0; }?>
  
  <h3> You may enjoy these other items in the <?php echo $collection; ?> collection: </h3>

  <?php $query = "SELECT id, name, manufacturer_reference FROM products WHERE collection='$collection' AND discontinued IS FALSE LIMIT 9 "; ?>
  <?php $products = $db->query($query); ?>
  
  <?php while ($product = $products->fetch_array(MYSQLI_ASSOC)) { ?>
    <div class='products_list'>
      <div style='height: 160px; width: 100%;'>
        <?php $image = "product_images/" . $product['manufacturer_reference'] . "-tn.jpg"; ?>
        <?php echo "<a href='catalog.php?action=view_product&parent=$parent&expand=$expand&product_id=" . $product['id'] ."'> "; ?>
        <?php echo resize_img($image, 150); ?>
        <?php echo "</a> "; ?>
      </div>
      <?php echo "<a href='catalog.php?action=view_product&parent=$parent&expand=$expand&product_id=" . $product['id'] . "'>" . $product['name'] . " " . $product['manufacturer_reference'] . "</a>"; ?> 

    </div>
  <?php }?>
  
</div>