<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $current_url = $_SERVER['REQUEST_URI']; ?>

<div id="container">
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>

<?php include("catalog/_catalog_menu.php"); ?>

<div class='products'>
  
  <?php // Static Pages ?>
  <?php if (empty($parent) && empty($expand) && empty($view)) { ?>
    <?php include('catalog_home.php'); ?>
  <?php } elseif ($parent == 'american' && empty($expand) && empty($view) ) {?>
    <?php include('american_west.php'); ?>
  <?php } elseif ($parent == 'lou-ella' && empty($expand) && empty($view) ) {?>
    <?php include('lou-ella.php'); ?>
  <?php } elseif ($parent == 'schaefer' && empty($expand) && empty($view) ) {?>
    <?php include('schaefer.php'); ?>
  <?php } elseif ($parent == 'decor' && empty($expand) && empty($view) ) {?>
    <?php include('decor.php'); ?>
  <?php } elseif ($parent == 'accessories' && empty($expand) && empty($view) ) {?>
    <?php include('accessories.php'); ?>
  <?php } elseif ($parent == 'montana_silver') { ?>
    <?php include('montana_silver.php'); ?>
  <?php } elseif ($parent == 'custom_boots') { ?>
    <?php include('custom_boots.php'); ?>
  
  <?php // Dynamic Pages ?>
  <?php } else { ?>
    <?php include('dynamic_pages.php'); ?>
  <?php } ?>
  
</div>


  <div style="clear: both">
  </div>
  
  </div>
  
  <div class='content_bottom'></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>