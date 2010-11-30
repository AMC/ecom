<?php
  $form_variables = array('parent', 'expand', 'view');
  foreach ($form_variables as $var) {
    $$var = request_var($db, $var);
  }
  $curl = $_SERVER['PHP_SELF'];
?>

<div class='categories'>

  <ul class='acc_menu collapsible'>

   <li <?php if ($parent == 'american') {echo "class='expand'" ; }?> >
		 <?php echo "<a href='$curl?parent=american'>AMERICAN WEST</a>"; ?>
		 <ul class="acc_menu nestedmenu acc_item collapsible">
		   <li <?php if ($expand == 'awcategories') {echo "class='expand'" ; }?> >
			   <a href="#">Categories</a>
				 <ul class="acc_item">
				   <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE manufacturer='American West'"); ?>
				   <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
    		     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
    		     <?php $current = ucwords(strtolower($menu_category['category'])); ?>
    		     <?php if ($selection == $current && $parent == 'american') { ?>
    			     <?php echo "<li class='selected_menu_item'><a href='$curl?parent=american&expand=awcategories&view=$menu_view'> $current </a></li>"; ?>
  			     <?php } else {?>
  			       <?php echo "<li><a href='$curl?parent=american&expand=awcategories&view=$menu_view'> $current </a></li>"; ?>
  			     <?php } ?>
				   <?php } ?>
				 </ul>
			 </li>
			 <li <?php if ($expand == 'awcollections') {echo "class='expand'" ; }?> >
				 <a href="#">Collections</a>
				 <ul class="acc_item expland">
				   <?php $collections = $db->query("SELECT DISTINCT(collection) FROM products WHERE manufacturer='American West'"); ?>
				   <?php while ($collection = $collections->fetch_array(MYSQLI_ASSOC)) { ?>
				     <?php $menu_view = str_replace(" ", "_", $collection['collection']); ?>
				     <?php $current = ucwords(strtolower($collection['collection'])); ?>
				     <?php if ($selection == $current && $parent == 'american') { ?>
  				     <?php echo "<li class='selected_menu_item'><a href='$curl?parent=american&expand=awcollections&view=$menu_view'> $current </a></li>"; ?>
  				   <?php } else { ?>
   				     <?php echo "<li><a href='$curl?parent=american&expand=awcollections&view=$menu_view'> $current </a></li>"; ?>
   				   <?php } ?>
				   <?php } ?>

				 </ul>
			 </li>
		 </ul>
	 </li>
	 
	 <li <?php if ($parent == 'lou-ella') {echo "class='expand'" ; }?> >
		 <a href="#">LOU-ELLA</a>
		 <ul class="acc_menu nestedmenu acc_item collapsible">
		   <li <?php if ($expand == 'lecategories') {echo "class='expand'" ; }?> >
			   <a href="#">Categories</a>
				 <ul class="acc_item">
				   <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE manufacturer='Lou-Ella'"); ?>
				   <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
    		     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
    		     <?php $current = ucwords(strtolower($menu_category['category'])); ?>
				     <?php if ($selection == $current && $parent == 'lou-ella') { ?>
				       <?php echo "<li class='selected_menu_item'><a href='$curl?parent=lou-ella&expand=lecategories&view=$menu_view'> $current </a></li>"; ?>
				     <?php } else { ?>
				       <?php echo "<li><a href='$curl?parent=lou-ella&expand=lecategories&view=$menu_view'> $current </a></li>"; ?>
				     <?php } ?>
				   <?php } ?>
				 </ul>
			 </li>
			 <li <?php if ($expand == 'lecollections') {echo "class='expand'" ; }?> >
				 <a href="#">Collections</a>
				 <ul class="acc_item">
				   <?php $collections = $db->query("SELECT DISTINCT(collection) FROM products WHERE manufacturer='Lou-Ella'"); ?>
				   <?php while ($collection = $collections->fetch_array(MYSQLI_ASSOC)) { ?>
				     <?php $menu_view = str_replace(" ", "_", $collection['collection']); ?>
				     <?php $current = ucwords(strtolower($collection['collection'])); ?>
				     <?php if ($selection == $current && $parent == 'lou-ella') { ?>
   				     <?php echo "<li class='selected_menu_item'><a href='$curl?parent=lou-ella&expand=lecollections&view=$menu_view'> $current </a></li>"; ?>
   				   <?php } else { ?>
   				     <?php echo "<li><a href='$curl?parent=lou-ella&expand=lecollections&view=$menu_view'> $current </a></li>"; ?>
   				   <?php } ?>
				   <?php } ?>

				 </ul>
			 </li>
		 </ul>
	 </li>

   <li <?php if ($parent == 'schaefer') {echo "class='expand'" ; }?> >
     <a href='#' style='font-size: 13px'>SCHAEFER OUTFITTER</a>
     <ul class='acc_item'>
		   <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE manufacturer='Schaefer'"); ?>
		   <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
		     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
		     <?php $current = ucwords(strtolower($menu_category['category'])); ?>
		     <?php if ($selection == $current && $parent == 'schaefer') { ?>
  		     <?php echo "<li class='selected_menu_item'><a href='$curl?parent=schaefer&view=$menu_view'> $current </a></li>"; ?>
  		   <?php } else { ?>
  		     <?php echo "<li><a href='$curl?parent=schaefer&view=$menu_view'> $current </a></li>"; ?>
  		  <?php } ?>
		   <?php } ?>
     </ul>
   </li>
   
 <?php if ($selection == 'Montana Silver') { ?>
   <li class='selected_menu_item'> 
 <?php } else { ?>
   <li>
 <?php }?>
     <a href='<?php echo $curl;?>?view=montana_silver'>MONTANA SILVER</a>
   </li>
	 
 <?php if ($selection == 'Hats') { ?>
   <li class='selected_menu_item'> 
 <?php } else { ?>
   <li>
 <?php }?>
     <a href='<?php echo $curl;?>?view=hats'>HATS</a>
   </li>
	 
 <?php if ($selection == 'Kids') { ?>
   <li class='selected_menu_item'> 
 <?php } else { ?>
   <li>
 <?php }?>
     <a href='<?php echo $curl;?>?view=kids'>KIDS</a>
   </li>

 <?php if ($selection == 'Custom Boots') { ?>
   <li class='selected_menu_item'> 
 <?php } else { ?>
   <li>
 <?php }?>
     <a href='<?php echo $curl;?>?view=custom_boots'>CUSTOM BOOTS</a>
   </li>

   <li <?php if ($parent == 'decor') {echo "class='expand'" ; }?>>
     <a href='#'>DECOR</a>
     <ul class='acc_item'>
       <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE parent_category='Decor'"); ?>
		   <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
		     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
		     <?php $current = ucwords(strtolower($menu_category['category'])); ?>
		     <?php if ($selection == $current && $parent == 'decor') { ?>
  		     <?php echo "<li class='selected_menu_item'><a href='$curl?parent=decor&view=$menu_view'> $current </a></li>"; ?>
  		   <?php } else {?>
  		     <?php echo "<li><a href='$curl?parent=decor&view=$menu_view'> $current </a></li>"; ?>
  		   <?php } ?>
		   <?php } ?>
     </ul>
   </li>

    <li <?php if ($parent == 'accessories') {echo "class='expand'" ; }?>>
     <a href='#'>ACCESSORIES</a>
     <ul class='acc_item'>
       <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE parent_category='Accessories'"); ?>
		   <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
		     <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
		     <?php $current = $menu_category['category']; ?>
		     <?php if ($selection == $current && $parent == 'accessories') { ?>
  		     <?php echo "<li class='selected_menu_item'><a href='$curl?parent=accessories&view=$menu_view'> $current </a></li>"; ?>
  		   <?php } else { ?>
  		     <?php echo "<li><a href='$curl?parent=accessories&view=$menu_view'> $current </a></li>"; ?>
  		  <?php } ?>
		   <?php } ?>
       

     </ul>
   </li>
   
   
  </ul>
</div>