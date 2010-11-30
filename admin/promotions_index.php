
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id="container">
  <h3> Sales and Promotions </h3>

  <form action='admin.php' method='POST'>
    <input type='text' name='promo_name' />
    <input type='hidden' name='action' value='new_promotion' />
    <input type='submit' value='New Promotion' />
  </form>
  <br />
  
  <table style='width: 100%'>
    <th>Name</th>
    <th>Start</th>
    <th>End</th>
    <th>Sales</th>
    <th>Savings</th>
    <th style='width: 200px;'></th>

  <?php $promotions = $db->query("SELECT * FROM promotions ORDER BY end DESC"); ?>    
  <?php while ($promotion = $promotions->fetch_array(MYSQLI_ASSOC)) {?>
    <tr>
      <td style='text-align: right'>
        <?php echo $promotion['name']; ?>
      </td>
      <td style='text-align: right'>
        <?php echo $promotion['start']; ?>
      </td>
      <td style='text-align: right'>
        <?php echo $promotion['end']; ?>
      </td>
      <td style='text-align: right'>
        <?php echo money_format('%(#10n', $promotion['sales']); ?>
      </td>
      <td style='text-align: right'>
        <?php echo money_format('%(#10n', $promotion['savings']); ?>
      </td>
      <td style='text-align: right'>
        <form action='admin.php' method='post' style='display: inline;'>
          <input type='hidden' name='promo_id' value="<?php echo $promotion['id'];?>" />
          <input type='hidden' name='action' value='delete_promotion' />
          <input type='submit' value='delete' />
        </form>
        <form action='admin.php' method='post' style='display: inline;'>
          <input type='hidden' name='promo_id' value="<?php echo $promotion['id'];?>" />
          <input type='hidden' name='action' value='edit_promotion' />
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