
<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  <h3> Process Products File </h3>

  Notes: <br />
  <textarea name='notes' style='width: 100%;'>
    process: Detailed Product Descriptions July 2010
    then:    UPC Codes July 2010
    some products are not being named
  </textarea>

  <br />
  <br />

  <form action="admin.php" enctype="multipart/form-data" method="POST">
    <input type='hidden' name='action' value='upload_file' />
    Upload New File (in CSV format): <br />
  	<input name="uploaded_file" type="file"><input type="submit" value="Upload">
	</form>
  
  <br />

  <table style='width: 80%;'>
    <th colspan='2'>Current Files:</th>
  <?php if ($handle = opendir('files')) { ?>  
      <?php while (false !== ($filename = readdir($handle))) { ?>
          <?php if (substr($filename, -3,3) == 'csv') { ?>
            <?php echo "<tr>"; ?>
            <?php echo "<td> $filename </td>";  ?>
            <?php echo "<td>"; ?>
            <?php echo "<a href='admin.php?action=display_file&filename=$filename'>[display]</a> "; ?>
            <?php echo "<a href='admin.php?action=process_file&filename=$filename'>[process]</a> "; ?>
            <?php echo "<a href='admin.php?action=delete_file&filename=$filename'>[delete]</a> "; ?>
            <?php echo "</td>"; ?>
          <?php } ?>
      <?php } ?>
      <?php closedir($handle); ?>
 <?php  } ?>
  </table>
    
  <br />

	
  
 <div style="clear: both">
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>