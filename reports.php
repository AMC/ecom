<?php 

include_once("config/initialize.php"); 

$stylesheets = array('admin.css', ''); // Overwrite layout.css
$javascripts[] = '';

include_once("config/database.php"); 
include_once("config/functions.php");

if (role() != 'admin') {
  $_SESSION['flash'][] = 'You are not authorized to view that area.';
  header("Location: index.php");
}
?>

<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
<?php if ( action() == 'none' ) { ?>
  <h3> Reports </h3>
  <br />
  <a href='reports.php?action=emails'>Newsletter Emails</a>        
  <br />
<?php } ?>

<?php if (action() == 'emails') { ?>
  <?php include('reports/emails.php'); ?>
<?php } ?>


  <div style="clear: both"></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>