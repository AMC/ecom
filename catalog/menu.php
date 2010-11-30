<div id='left_column'>
  <ul>
    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE discontinued IS FALSE"); ?>
    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
     <?php $current = $menu_category['category']; ?>
     <?php if ($selection == $current) { ?>
       <?php echo "<li class='selected_menu_item'><a href='$curl?parent=accessories&view=$menu_view'> $current </a></li>"; ?>
     <?php } else { ?>
       <?php echo "<li><a href='$curl?view=$menu_view'> $current </a></li>"; ?>
    <?php } ?>
    <?php } ?>
   </ul>
</div>