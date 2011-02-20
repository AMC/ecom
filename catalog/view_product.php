<?php $stylesheets[] = 'categories.css'; ?>

<?php include('layout/header.php'); ?>
<?php include('layout/menu.php'); ?>
<?php include('layout/flash_message.php'); ?>

<div id='container'>

  <?php include('catalog/menu.php'); ?>
  
  <div id='right_column'>
    <?php $products = $db->query("SELECT * FROM products WHERE id='$product_id' "); ?>
    <?php $product = $products->fetch_array(MYSQLI_ASSOC); ?>

    <?php if (role() == 'admin') { ?>
      <?php if (action() == 'new_product') { ?>
        <?php include('catalog/new_product.php'); ?>
      <?php } else { ?>
        <?php include('catalog/update_view.php'); ?>
      <?php } ?>
    <?php } else { ?>
      <?php include('catalog/product_view.php'); ?>
    <?php } ?>
  </div>



  <div style='clear: both'></div>
  
</div>

<div class='content_bottom'></div>
<?php include('layout/footer.php'); ?>