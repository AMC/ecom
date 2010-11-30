
<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  <h3> Shipping Table </h3>
  
  <table style='width:100%'>
    <th style='text-align: center'>category</th>
    <th style='text-align: center'>rate</th>
    <th style='text-align: center'>notes</th>
    <th></th>
    

    <form action='admin.php' method='post'>
    <tr style='text-align: center;'>
      <td>  
       <input type='text' name='shipping_category' size='10' />
      </td>
      <td>
        <input type='text' name='shipping_rate' size='10' style='text-align: right;' />
      </td>
      <td>
        <input type='text' name='shipping_notes' size='30' maxlength='255' / >
      <td>
        <input type='hidden' name='action' value='new_shipping_category' />
        <input type='submit' value='add category' / >
      </td>
    </tr>
    </form>
    


  
  <?php $categories = $db->query("SELECT id, category, rate, notes FROM shipping"); ?>
  <?php while ($category = $categories->fetch_array(MYSQLI_ASSOC)) { ?>

    <form action='admin.php' method='post'>
    <tr style='text-align: center'>
      <td>  
       <input type='text' name='shipping_category' size='10' value='<?php echo $category['category']; ?>' />
      </td>
      <td>
        <input type='text' name='shipping_rate' size='10' value='<?php echo $category['rate']; ?>' style='text-align: right;' />
      </td>
      <td>
        <input type='text' name='shipping_notes' size='30' maxlength='255' value='<?php echo $category['notes']; ?>' / >
      <td>
        <input type='hidden' name='action' value='update_shipping_category' />
        <input type='hidden' name='shipping_id' value='<?php echo $category['id']; ?>' />
        <input type='submit' value='update category' / >
        <a href='admin.php?action=shipping_view_products&shipping_id=<?php echo $category['id']?>'> [products] </a>
      </td>
    </tr>
    </form>

  <?php }?>
  </table>
  


  <div style="clear: both"></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>