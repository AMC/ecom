<?php
  $form_variables = array('parent', 'expand', 'view');
  foreach ($form_variables as $var) {
    $$var = request_var($db, $var);
  }
  $curl = 'catalog.php'; //$_SERVER['PHP_SELF'];
?>

<div class='categories'>

  <ul>
    <?php // Start of American West ?>
    <li>
      <?php if ($parent == 'american') { ?>
        <?php if ( $parent == 'american' && empty($expand) && empty($view) ) { ?>
          <?php echo "<a href='$curl?parent=american' class='selected_menu_item'>American West</a>"; ?>          
        <?php } else { ?>
          <?php echo "<a href='$curl?parent=american'>American West</a>"; ?>
        <?php } ?>

        <ul>
          <li>
            <?php if ( $expand=='awcategories' && empty($view) ) { ?>
              <?php echo "<a href='$curl?parent=american&expand=awcategories' class='selected_menu_item'>Categories</a>"; ?>
            <?php } else { ?>
              <?php echo "<a href='$curl?parent=american&expand=awcategories'>Categories</a>"; ?>        
            <?php } ?>
            
            <?php if ( $expand=='awcategories') { ?>
              <ul>              
    				    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE manufacturer='American West' AND category != '' AND discontinued IS FALSE ORDER BY category"); ?>
     				    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
         		      <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
         		      <?php $current = ucwords(strtolower($menu_category['category'])); ?>
         		      <?php if ($selection == $current && $parent == 'american') { ?>
         			      <?php echo "<li><a href='$curl?parent=american&expand=awcategories&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
       			      <?php } else {?>
       			        <?php echo "<li><a href='$curl?parent=american&expand=awcategories&view=$menu_view'> $current </a></li>"; ?>
       			      <?php } ?>
     				    <?php } ?>
     				  </ul>
            <?php }?>
            
            
          </li>
                    
          <li>
            <?php if ( $expand=='awcollections' && empty($view) ) { ?>
               <?php echo "<a href='$curl?parent=american&expand=awcollections' class='selected_menu_item'>Collections</a>"; ?>        
            <?php } else { ?>
              <?php echo "<a href='$curl?parent=american&expand=awcollections'>Collections</a>"; ?>        
            <?php } ?>

            <?php if ( $expand=='awcollections') { ?>
              <ul>
     				   <?php $collections = $db->query("SELECT DISTINCT(collection) FROM products WHERE manufacturer='American West' AND collection != '' AND discontinued IS FALSE ORDER BY collection"); ?>
     				   <?php while ($collection = $collections->fetch_array(MYSQLI_ASSOC)) { ?>
     				     <?php $menu_view = str_replace(" ", "_", $collection['collection']); ?>
     				     <?php $current = ucwords(strtolower($collection['collection'])); ?>
     				     <?php if ($selection == $current && $parent == 'american') { ?>
       				     <?php echo "<li><a href='$curl?parent=american&expand=awcollections&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
       				   <?php } else { ?>
        				     <?php echo "<li><a href='$curl?parent=american&expand=awcollections&view=$menu_view'> $current </a></li>"; ?>
        				   <?php } ?>
     				   <?php } ?>
    				   </ul>
    				  <?php } ?>
          </li>
        </ul>

      <?php } else { ?>
        <?php echo "<a href='$curl?parent=american'>American West</a>"; ?>        
      <?php } ?>
    </li>
    <?php // End of American West ?>

    
    <?php // Start of Lou-Ella ?>
    <li>
      <?php if ($parent == 'lou-ella') { ?>
        <?php if ( $parent == 'lou-ella' && empty($expand) && empty($view) ) { ?>
          <?php echo "<a href='$curl?parent=lou-ella' class='selected_menu_item'>Lou-Ella</a>"; ?>          
        <?php } else { ?>
          <?php echo "<a href='$curl?parent=lou-ella'>Lou-Ella</a>"; ?>
        <?php } ?>

        <ul>
          <li>
            <?php if ( $expand=='lecategories' && empty($view) ) { ?>
              <?php echo "<a href='$curl?parent=lou-ella&expand=lecategories' class='selected_menu_item'>Categories</a>"; ?>
            <?php } else { ?>
              <?php echo "<a href='$curl?parent=lou-ella&expand=lecategories'>Categories</a>"; ?>        
            <?php } ?>
            
            <?php if ( $expand=='lecategories') { ?>
              <ul>              
    				    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE manufacturer='Lou-Ella' AND category != '' AND discontinued IS FALSE ORDER BY category"); ?>
     				    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
         		      <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
         		      <?php $current = ucwords(strtolower($menu_category['category'])); ?>
         		      <?php if ($selection == $current && $parent == 'lou-ella') { ?>
         			      <?php echo "<li><a href='$curl?parent=lou-ella&expand=lecategories&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
       			      <?php } else {?>
       			        <?php echo "<li><a href='$curl?parent=lou-ella&expand=lecategories&view=$menu_view'> $current </a></li>"; ?>
       			      <?php } ?>
     				    <?php } ?>
     				  </ul>
            <?php }?>
            
            <li>
              <?php if ( $expand=='lecollections' && empty($view) ) { ?>
                 <?php echo "<a href='$curl?parent=lou-ella&expand=lecollections' class='selected_menu_item'>Collections</a>"; ?>        
              <?php } else { ?>
                <?php echo "<a href='$curl?parent=lou-ella&expand=lecollections'>Collections</a>"; ?>        
              <?php } ?>

              <?php if ( $expand=='lecollections') { ?>
                <ul>
       				   <?php $collections = $db->query("SELECT DISTINCT(collection) FROM products WHERE manufacturer='Lou-Ella' AND collection != '' AND discontinued IS FALSE ORDER BY collection"); ?>
       				   <?php while ($collection = $collections->fetch_array(MYSQLI_ASSOC)) { ?>
       				     <?php $menu_view = str_replace(" ", "_", $collection['collection']); ?>
       				     <?php $current = ucwords(strtolower($collection['collection'])); ?>
       				     <?php if ($selection == $current && $parent == 'lou-ella') { ?>
         				     <?php echo "<li><a href='$curl?parent=lou-ella&expand=lecollections&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
         				   <?php } else { ?>
          				     <?php echo "<li><a href='$curl?parent=lou-ella&expand=lecollections&view=$menu_view'> $current </a></li>"; ?>
          				   <?php } ?>
       				   <?php } ?>
      				   </ul>
      				  <?php } ?>
            </li>
          </li>
        </ul>    

      <?php } else { ?>
        <?php echo "<a href='$curl?parent=lou-ella'>Lou-Ella</a>"; ?>        
      <?php } ?>
    </li>
    <?php // End of Lou-Ella ?>
    
    
    
    
    <?php // Start of Schaefer ?>
    <li>
      <?php if ($parent == 'schaefer') { ?>
        <?php if ( $parent == 'schaefer' && empty($view) ) { ?>
          <?php echo "<a href='$curl?parent=schaefer' class='selected_menu_item'>Schaefer</a>"; ?>          
        <?php } else { ?>
          <?php echo "<a href='$curl?parent=schaefer'>Schaefer</a>"; ?>
        <?php } ?>
          <li>
              <ul>              
    				    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE manufacturer='schaefer' AND category != '' AND discontinued IS FALSE ORDER BY category"); ?>
     				    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
         		      <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
         		      <?php $current = ucwords(strtolower($menu_category['category'])); ?>
         		      <?php if ($selection == $current && $parent == 'schaefer') { ?>
         			      <?php echo "<li><a href='$curl?parent=schaefer&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
       			      <?php } else {?>
       			        <?php echo "<li><a href='$curl?parent=schaefer&view=$menu_view'> $current </a></li>"; ?>
       			      <?php } ?>
     				    <?php } ?>
     				  </ul>
         
          </li>

      <?php } else { ?>
        <?php echo "<a href='$curl?parent=schaefer'>Schaefer</a>"; ?>        
      <?php } ?>
    </li>
    <?php // End of Schaefer ?>
    
    
    <?php // Start of Montana Silver Smith ?>
    <li>
      <?php if ($parent == 'montana_silver') { ?>
        <?php echo "<a href='$curl?parent=montana_silver' class='selected_menu_item'>Montana Silver</a>"; ?>          
      <?php } else { ?>
        <?php echo "<a href='$curl?parent=montana_silver'>Montana Silver</a>"; ?>
      <?php } ?>
      
    <?php // End of Montana Silver Smith?>

 		<?php // Start of Hats ?>
    <li>
      <?php if ($parent == 'hats') { ?>
        <?php echo "<a href='$curl?parent=hats&view=hats' class='selected_menu_item'>Hats</a>"; ?>          
      <?php } else { ?>
        <?php echo "<a href='$curl?parent=hats&view=hats'>Hats</a>"; ?>
      <?php } ?>
      
    <?php // End of Hats ?>
    
    <?php // Start of Kids ?>
    <li>
      <?php if ($parent == 'kids') { ?>
        <?php echo "<a href='$curl?parent=kids&view=kids' class='selected_menu_item'>Kids</a>"; ?>          
      <?php } else { ?>
        <?php echo "<a href='$curl?parent=kids&view=kids'>Kids</a>"; ?>
      <?php } ?>
      
    <?php // End of Kids?>
 			 
 			 
 		<?php // Start of Custom Boots ?>
    <li>
      <?php if ($parent == 'custom_boots') { ?>
        <?php echo "<a href='$curl?parent=custom_boots' class='selected_menu_item'>Custom Boots</a>"; ?>          
      <?php } else { ?>
        <?php echo "<a href='$curl?parent=custom_boots'>Custom Boots</a>"; ?>
      <?php } ?>
      
    <?php // End of Custom Boots?>	 
    
    
    <?php // Start of Decor ?>
    <li>
      <?php if ($parent == 'decor') { ?>
        <?php if ( $parent == 'decor' && empty($view) ) { ?>
          <?php echo "<a href='$curl?parent=decor' class='selected_menu_item'>Decor</a>"; ?>          
        <?php } else { ?>
          <?php echo "<a href='$curl?parent=decor'>Decor</a>"; ?>
        <?php } ?>
          <li>
              <ul>              
    				    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE parent_category='decor' AND category != '' AND discontinued IS FALSE ORDER BY category"); ?>
     				    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
         		      <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
         		      <?php $current = ucwords(strtolower($menu_category['category'])); ?>
         		      <?php if ($selection == $current && $parent == 'decor') { ?>
         			      <?php echo "<li><a href='$curl?parent=decor&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
       			      <?php } else {?>
       			        <?php echo "<li><a href='$curl?parent=decor&view=$menu_view'> $current </a></li>"; ?>
       			      <?php } ?>
     				    <?php } ?>
     				  </ul>
         
          </li>

      <?php } else { ?>
        <?php echo "<a href='$curl?parent=decor'>Decor</a>"; ?>        
      <?php } ?>
    </li>
    <?php // End of Decor ?>
    
    
    <?php // Start of Accessories ?>
    <li>
      <?php if ($parent == 'accessories') { ?>
        <?php if ( $parent == 'accessories' && empty($view) ) { ?>
          <?php echo "<a href='$curl?parent=accessories' class='selected_menu_item'>Accessories</a>"; ?>          
        <?php } else { ?>
          <?php echo "<a href='$curl?parent=accessories'>Accessories</a>"; ?>
        <?php } ?>
          <li>
              <ul>              
    				    <?php $menu_categories = $db->query("SELECT DISTINCT(category) FROM products WHERE parent_category='accessories' AND category != '' AND discontinued IS FALSE ORDER BY category"); ?>
     				    <?php while ($menu_category = $menu_categories->fetch_array(MYSQLI_ASSOC)) { ?>
         		      <?php $menu_view = str_replace(" ", "_", $menu_category['category']); ?>
         		      <?php $current = ucwords(strtolower($menu_category['category'])); ?>
         		      <?php if ($selection == $current && $parent == 'accessories') { ?>
         			      <?php echo "<li><a href='$curl?parent=accessories&view=$menu_view' class='selected_menu_item'> $current </a></li>"; ?>
       			      <?php } else {?>
       			        <?php echo "<li><a href='$curl?parent=accessories&view=$menu_view'> $current </a></li>"; ?>
       			      <?php } ?>
     				    <?php } ?>
     				  </ul>
         
          </li>

      <?php } else { ?>
        <?php echo "<a href='$curl?parent=accessories'>Accessories</a>"; ?>        
      <?php } ?>
    </li>
    <?php // End of Accessories ?>
 			 
 			 
 	</ul>
</div>