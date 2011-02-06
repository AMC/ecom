<?php include_once("config/initialize.php"); ?>
<?php include_once("config/database.php"); ?>
<?php include_once("config/functions.php"); ?>

<?php $stylesheets[] = 'catalog.css'; ?>


<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>



<div id='container'>
  
<?php include 'catalog/menu.php'; ?>
  
  <div id='right_column'>
  	
    <h1>Finger Puppet Care</h1>
    <p>
    <?php $pages = $db->query("SELECT name, filetype, description FROM pages WHERE name='Finger Puppets Care' "); ?>
    <?php $page = $pages->fetch_array(MYSQL_ASSOC); ?>
      
    <?php echo nl2br($page['description']); ?>
    </p>

    <br /><br />

    
  </div>
  
  

  <div style="clear: both"> </div>

    
</div>

<?php include("layout/footer.php"); ?>