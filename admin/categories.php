
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id="container">
  <h3> Categories </h3>
  <em> All Category images should be 60x50 pixels </em>

  <table style='width: 100%; vertical-align: text-bottom;'>
    <th>Category</th>
    <th>Image</th>
    <th></th>

  <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE discontinued=FALSE ORDER BY category"); ?>    
  <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) {?>
    <?php $cat = str_replace(' ', '_', $menu_category['category']); ?>

    <tr>
      <td style='vertical-align: center; text-align: center'> 
        <a href='admin.php?action=category_contents&view=<?php echo $cat?>'><?php echo $menu_category['category']; ?></a>
      </td>
      <td style='text-align: center;'>

        <?php $image = "CAT-" . $cat . ".jpg"; ?>
        <?php if (file_exists('product_images/' . $image)) { ?> 
          <img src='product_images/<?php echo $image; ?>' />
        <?php } else { ?>
          <img src='http://placehold.it/60x50' />
        <?php } ?>

        
      </td>
      <td style='vertical-align: center; text-align: center;'>
        <form action='admin.php' enctype="multipart/form-data" method='POST'>
          <input type='hidden' name='action' value='update_category_image' />
          <input type='file' name='image' size='15' />
          <input type='hidden' name='category' value='<?php echo $cat; ?>' />
          <input type='hidden' name='type' value='category' />
          <input type='submit' value='update' class='button' />
        </form>        
      </td>
      
    </tr>
    
  <?php }?>
  

  </table>
  
  <br />
  


  <div style="clear: both"></div>
</div>

<?php include("layout/footer.php"); ?>