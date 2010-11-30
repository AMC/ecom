<?php include_once("config/initialize.php"); ?>
<?php include_once("config/database.php"); ?>
<?php include_once("config/functions.php"); ?>

<?php $stylesheets[] = ''; ?>

<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id='container'>
  
  <div style='margin: -10px 0px 10px; width: 100%; text-align: center'>
		<img src="images/main-pic.png" width="862" height="231" alt="HAV Western Wear" />
  </div>
    
  <div style='float: left;'>
    <a href="catalog.php?parent=schaefer" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Schaefer','','images/schaefer_box2.png',1)">
      <img src="images/schaefer_box1.png" alt="Schaefer Outfitters" width="268" height="160" border="0" id="Schaefer" />
    </a>
  </div>
  <div style='float: left; margin-left: 28px;'>
    <a href="catalog.php?parent=accessories" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('accessories','','images/accessories_box2.png',1)">
      <img src="images/accessories_box1.png" alt="Accessories" width="270" height="160" border="0" id="accessories" />
    </a>
  </div>
  <div style='float: right;'>    
    <a href="catalog.php?parent=decor" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('decor','','images/decor_box2.png',1)">
      <img src="images/decor_box1.png" alt="Decor" width="268" height="160" border="0" id="decor" />
    </a>
  </div>

  <div style="clear: both"> </div>
  
  
  <div class='content_top'>
  </div>
  
  <div class='content'>
    <h1 style='padding-top: 10px; padding-bottom: 10px; '>Welcome!</h1>
    <p>
    	HAV Western Wear is located in the Pacific Northwest in the &quot;City of Spokane Valley.&quot; HAV 
    	Western Wear specializes in better western clothing and boots. We carry Lucchese, Justin, Tony Lama, Stewart, 
    	and Dan Post to name a few. We also have a local &quot;CUSTOM BOOT&quot; maker for hard-to-fit and unusual 
    	style requests. We carry distinctive women's and men's clothing from all the major brands and great retro looks.
    </p>
  </div>
 
  <div class='content_bottom'>
  </div>
  

  <div style="clear: both"> </div>

    
</div>

<?php include("layout/_layout_bottom.php"); ?>