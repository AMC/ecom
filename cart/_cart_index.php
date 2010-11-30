<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

    <?php include('cart/cart_contents.php'); ?>
    
    <?php if ($cart_items->num_rows != 0 ) { ?>
      <?php include("catalog/other_items_collection.php"); ?>
    <?php } ?>
    
    <div style="clear: both">
      &nbsp;
    </div>

  </div>  
  
  <div class='content_bottom'>
  </div>

  <div style="clear: both">
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>