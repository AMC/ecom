<?php $stylesheets[] = 'categories.css'; ?>

<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

  <?php include("catalog/_catalog_menu.php"); ?>
  
  <?php $product = $db->query("SELECT * FROM products WHERE id='$product_id' "); ?>
  <?php $product = $product->fetch_array(MYSQLI_ASSOC); ?>

  <?php if (role() == 'admin') { ?>
    <?php if (action() == 'new') { ?>
      <?php include('catalog/new_view.php'); ?>
    <?php } else { ?>
      <?php include('catalog/update_view.php'); ?>
    <?php } ?>
  <?php } else { ?>
    <?php include('catalog/product_view.php'); ?>
  <?php } ?>
    



  <div style="clear: both"></div>
  
</div>

<div class='content_bottom'></div>
<?php include("layout/_layout_bottom.php"); ?>