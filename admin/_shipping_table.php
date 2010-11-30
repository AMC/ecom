
<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  <h3> Shipping Table </h3>
  
  <table id='shipping_table'>
    <th style='text-align: center'>tier</th>
    <th>min</th>
    <th>max</th>
    <th>ground</th>
    <th>third day</th>
    <th>second day</th>
    <th>next day</th>
    <th></th>
    <th></th>
    
    <?php $prev_max = 0; ?>
    <?php $shipping_tiers = $db->query("SELECT id, tier, max_amt, ground, third_day, second_day, next_day FROM shipping ORDER BY tier"); ?>
    <?php while ($shipping = $shipping_tiers->fetch_array(MYSQLI_ASSOC)) { ?>

    <form action='admin.php' method='post'>
    <input type='hidden' name='action' value='update_shipping_tier' />
    <input type='hidden' name='shipping_id' value='<?php echo $shipping['id']; ?>' />
    <input type='hidden' name='prev_max' value='<?php echo $prev_max; ?>' />
    
    <tr>
      <td style='text-align: center;'>
        <?php echo $shipping['tier'];?>
      </td>
      
      <td>
        <?php echo money_format('%(#10n', $prev_max); ?>
      </td>
      
      <td>
        <input type='text' name='max_amt' value= '<?php echo $shipping['max_amt']; ?>' size='8' />
        
      </td>

      <td>
        <input type='text' name='ground' value= '<?php echo $shipping['ground']; ?>' size='8' />
      </td>
      
      <td>
        <input type='text' name='third_day' value= '<?php echo $shipping['third_day']; ?>' size='8' />
      </td>

      <td>
        <input type='text' name='second_day' value= '<?php echo $shipping['second_day']; ?>' size='8' />
      </td>
      
      <td>
        <input type='text' name='next_day' value= '<?php echo $shipping['next_day']; ?>' size='8' />
      </td>
      
      <td>
        <input type='submit' value='update' />
      </td>

    </tr>
    </form>
    <?php $prev_max = $shipping['max_amt']; ?>
    <?php } ?>

  </table>
  
  <br />
  


  <div style="clear: both"></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>