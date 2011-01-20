<?php include_once("config/initialize.php"); ?>
<?php include_once("config/database.php"); ?>
<?php include_once("config/functions.php"); ?>

<?php $stylesheets[] = 'catalog.css'; ?>
<?php $javascripts[] = 'slideshow.js'; ?>


<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id='container'>
  
  <?php include 'catalog/menu.php'; ?>
  
  <div id='right_column'>
    <div id='slideshow'>
  		<img src="images/slideshow/pic1.jpg" name="SlideShow" width="100%" height="392px" id="VU">
    </div>
    <br /><br />
    
  	<h1>Welcome!</h1>
    <p>
      SafariStuff&trade; is your one stop shopping center for unique, one of a kind items that you'll find nowhere else on the internet!
		</p>
    <p>
	  	We have the answer you're looking for especially when you're racking your brain trying to come up with something for that 
      person who has <i>everything</i>.
    </p>
    <p>
      As you look through our inventory you'll quickly see that our artists use such wonders of nature as Elk Antlers to 
      create gifts that simply can't be duplicated.
    </p>
    <p>
		  Make that person you're shopping for feel special with a gift from SafariStuff.   
    </p>
    <p>
  		We at SafariStuff also invite you to visit our sister site:  <a href="http://www.secondgradesafari.org" target="_blank">
      www.secondgradesafari.org</a> where you'll find fun online games, a way to benefit the students in your school and how 
      you can get discounts on our merchandise.  
    </p>

    <p>
  		<font size="-2"><i>*A portion of every dollar from merchandise sold on SafariStuff goes to the Save the Giraffe Foundation 
      and other Wildlife organizations.</i></font>
    </p>
    
  </div>
  
  

  <div style="clear: both"> </div>

    
</div>

<?php include("layout/footer.php"); ?>