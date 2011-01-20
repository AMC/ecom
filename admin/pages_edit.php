
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>


<div id="container">
  <h3> Edit Page </h3>

  <table style='width: 80%; margin: 0px auto;'>
    
  <form action='admin.php' method='post' enctype='multipart/form-data' >

  <?php $pages = $db->query("SELECT id, name, filetype, description FROM pages WHERE id=$page_id"); ?>    
  <?php while ($page = $pages->fetch_array(MYSQLI_ASSOC)) {?>
    <th>
      <?php echo $page['name']; ?>
  
    <tr>
      <td style='text-align: center'>
        <textarea name='page_description' style='width: 99%; height: 200px; margin: 5px auto;'><?php echo $page['description']; ?></textarea>
      </td>
    </tr>
    
    <tr>
      <td style='text-align: right;'>
        <br />
        <input type='hidden' name='page_name' value="<?php echo $page['name']; ?>" />
        <input type='hidden' name='page_id' value="<?php echo $page['id']; ?>" / >
        <input type='hidden' name='action' value='update_page' />
        <input type='submit' value='update' />
        <br /><br />
    
    
    
  <?php }?>
  
  </form>
  </table>
  
  <br />
  


  <div style="clear: both"></div>
</div>

<?php include("layout/footer.php"); ?>