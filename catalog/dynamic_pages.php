<?php $product_count = "SELECT COUNT(*) FROM products WHERE category='$selection'"; ?>
<?php $query = "SELECT id, name, reference FROM products WHERE category='$selection' AND discontinued IS FALSE ORDER BY name LIMIT $offset, $offset_increment "; } ?>

<?php $count_array = $db->query($product_count)->fetch_row(); ?>
<?php $count = $count_array[0]; ?>

<?php $products = $db->query($query); ?>

<div id='prev'>
<?php if ($offset >= $offset_increment) { echo "<a href='" . $current_url . "&offset=$offset_prev' class='button'> Previous </a>"; }?> &nbsp;
</div>
<div id='next'>
<?php if ($offset_next < $count) { echo "<a href='" . $current_url . "&offset=$offset_next' class='button'> Next </a>"; }?> &nbsp;
</div>

<div style='width: 100%; font-size: 16px; font-weight: bold; text-align: center'>
  <?php echo "$selection"; ?> <br /><br />
</div>


<?php while ($product = $products->fetch_array(MYSQLI_ASSOC)) { ?>
  <div class='products_list'>
    <div style='width: 100%; height: 160px; '>
      <?php $image = "product_images/" . $product['reference'] . "-tn.jpg"; ?>
      <?php echo "<a href='catalog.php?action=view_product&parent=$parent&expand=$expand&view=$view&product_id=" . $product['id'] ."'> "; ?>
      <?php echo resize_img($image, 150); ?>
      <?php echo "</a> "; ?>
    </div>
    <br />
    <?php echo "<a href='catalog.php?action=view_product&parent=$parent&expand=$expand&view=$view&product_id=" . $product['id'] . "'>" . $product['name'] . "</a>"; ?> 

  </div>
<?php }?>

<div style="clear: both;">
</div>


<div id='prev'>
<?php if ($offset >= $offset_increment) { echo "<a href='" . $current_url . "&offset=$offset_prev' class='button'> Previous </a>"; }?> &nbsp;
</div>
<div id='next'>
<?php if ($offset_next < $count) { echo "<a href='" . $current_url . "&offset=$offset_next' class='button'> Next </a>"; }?> &nbsp;
</div>