
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id="container">
  <h3> Pages </h3>


  <br />
  
  
  <table style='width: 50%'>
    <th>Page</th>
    <th style='width: 100px;'></th>

  <?php $pages = $db->query("SELECT id, name FROM pages ORDER BY name"); ?>    
  <?php while ($page = $pages->fetch_array(MYSQLI_ASSOC)) {?>
    <tr>
      <td style='text-align: center'>
        <?php echo $page['name']; ?>
      </td>
      <td style='text-align: right'>
        <form action='admin.php' method='post' style='display: inline;'>
          <input type='hidden' name='page_id' value="<?php echo $page['id'];?>" />
          <input type='hidden' name='action' value='edit_page' />
          <input type='submit' value='edit' />
        </form>
      </td>      

        
      
    </tr>
    
  <?php }?>
  

  </table>
  
  <br />
  


  <div style="clear: both"></div>
</div>

<?php include("layout/footer.php"); ?>