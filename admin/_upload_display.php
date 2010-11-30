
<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">


  <?php	$filename = "files/" . $_REQUEST['filename']; ?>
  <?php	$filedata = fopen($filename, "r"); ?>

  <table>

  <?php while (!feof($filedata)) { ?>
  	<?php $fields = fgetcsv($filedata); ?>
	  <?php if ($fields != NULL) { ?>
    	<tr>
			<?php foreach ($fields as $value) { ?>
				<td> <?php echo $value; ?> </td>
			<?php	} ?>
			</tr>
		<?php	} ?>
	<?php	} ?>
					
		<?php fclose($filedata); ?>
  </table>


  <div style="clear: both">
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>