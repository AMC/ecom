<div id='left_column'>
  <ul>
    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE discontinued IS FALSE"); ?>
    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
     <?php $current = $menu_category['category']; ?>
     
     <li class='category selected'>
       <a href='catalog.php?parent=accessories&view=<?php echo $menu_view; ?>'>
         <?php $image = 'CAT-' . $menu_view . '.jpg'; ?>
         <?php if (file_exists('product_images/' . $image)) { ?> 
           <img src='product_images/<?php echo $image; ?>' />
         <?php } else { ?>
           <img src='http://placehold.it/60x50' />
         <?php } ?>
         <?php echo $current; ?>
       </a>
     </li>


     
    <?php } ?>
   </ul>
</div>