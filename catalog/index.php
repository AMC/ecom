<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<?php $current_url = $_SERVER['REQUEST_URI']; ?>

<div id="container">

<?php include("catalog/menu.php"); ?>

<div id='right_column'>
  <?php $product_count = "SELECT COUNT(*) FROM products WHERE category='$selection'"; ?>
  <?php $query = "SELECT id, name, price, description, reference FROM products WHERE category='$selection' AND discontinued IS FALSE ORDER BY name LIMIT $offset, $offset_increment "; ?>

  <?php $count_array = $db->query($product_count)->fetch_row(); ?>
  <?php $count = $count_array[0]; ?>

  <?php $products = $db->query($query); ?>

  <div id='prev'>
  <?php if ($offset >= $offset_increment) { echo "<a href='" . $current_url . "&offset=$offset_prev' class='button'> Previous </a>"; }?> &nbsp;
  </div>
  <div id='next'>
  <?php if ($offset_next < $count) { echo "<a href='" . $current_url . "&offset=$offset_next' class='button'> Next </a>"; }?> &nbsp;
  </div>

  <div style='text-align: center;'>
    <h1><?php echo "$selection"; ?></h1><br />
    <?php if ($selection == 'Finger Puppets') { echo "<a href='finger_puppets.php'>Finger Puppet Care Instructions</a>"; }?>
    <?php if ($selection == 'Stage Puppets') { echo "<a href='stage_puppets.php'>Finger Puppet Care Instructions</a>"; }?>
     <br /><br />
  </div>


  <?php while ($product = $products->fetch_array(MYSQLI_ASSOC)) { ?>
    <div class='product_list'>
      <div class='product_image'>
        <?php $image = "product_images/" . $product['reference'] . "-tn.jpg"; ?>
        <?php echo "<a href='catalog.php?action=view_product&expand=$expand&view=$view&product_id=" . $product['id'] ."'> "; ?>
        <?php echo resize_img($image, 125); ?>
        <?php echo "</a> "; ?>
      </div>
      <div class='product_text'>
        <?php echo "<a class='h3' href='catalog.php?action=view_product&expand=$expand&view=$view&product_id=" . $product['id'] . "'>" . $product['name'] . "</a>"; ?> <br />
        $<?php echo $product['price']; ?> <br /> <br />
        <?php echo substr($product['description'], 0, 245); ?>...
        <?php echo "<a href='catalog.php?action=view_product&expand=$expand&view=$view&product_id=" . $product['id'] ."'> "; ?> read more
        <?php echo "</a>"; ?>
        
      </div>
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

  
  
</div>


  <div style="clear: both">
  </div>
  
  </div>
  
  <div class='content_bottom'></div>
</div>

<?php include("layout/footer.php"); ?>