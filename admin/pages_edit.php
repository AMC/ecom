
<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  <h3> Edit Page </h3>

  <table style='width: 80%'>

  <?php $pages = $db->query("SELECT id, name, image, description FROM pages WHERE id=$page_id"); ?>    
  <?php while ($page = $pages->fetch_array(MYSQLI_ASSOC)) {?>
    <th>
      <?php echo $page['name']; ?>
  
    
    <tr>
      <td style='text-align: center'>
        <img src="files/<?php echo $page['name']; ?>.jpg" alt='image'><br /> <br />
      </td>
    </tr>
    <tr>
      <td style='text-align: center'>
        Update image: 
        <input type='file' name='pages_file' /> <br /><br />
      </td>
    </tr>
    
    <tr>
      <td style='text-align: left'>
        <textarea name='description' style='width: 99%; height: 200px;'><?php echo $page['description']; ?></textarea>
      </td>
    </tr>
    
    <tr>
      <td style='text-align: right;'>
        <br />
        <input type='hidden' name='page_id' value="<?php echo $page['id']; ?>" / >
        <input type='hidden' name='action' value='update_page' />
        <input type='submit' value='update' />
        <br /><br />
    
    
    
  <?php }?>
  

  </table>
  
  <br />
  


  <div style="clear: both"></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>