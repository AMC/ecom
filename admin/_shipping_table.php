
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
  <br />
  <br />
  

  <h3> Holiday Shipping Schedule </h3>
  <em>To be sure your package arrives by {Holiday} please see delivery schedule:</em>
  <table style='text-align: center; width: 100%'>
    <th>display</th>
    <th>holiday</th>
    <th>ground</th>
    <th>third day</th>
    <th>second day</th>
    <th>next day</th>
    <th></th>
    <th></th>

    <form method='post' action='admin.php'>
    <input type='hidden' name='action' value='hs_update' />
    
    <?php $hs = $db->query("SELECT display, name, ground, third_day, second_day, next_day FROM holiday_shipping"); ?>
    
    <?php $hs = $hs->fetch_array(MYSQLI_ASSOC); ?>

  <tr>
    <td>
      <?php if ($hs['display'] == 1) { ?> 
        <input type='checkbox' name='hs_display' checked>
      <?php } else { ?>
        <input type='checkbox' name='hs_display'>
      <?php } ?>
    </td>
    <td>
       <input type='text' name='hs_name' value= '<?php echo $hs['name']; ?>' size='15' />
     </td>
     
    <td>
       <input type='text' class='calendarSelectDate' name='hs_ground' value= '<?php echo $hs['ground']; ?>' size='15' readyonly />
       <div id="calendarDiv"></div>
     </td>
     
     <td>
       <input type='text' class='calendarSelectDate' name='hs_third_day' value= '<?php echo $hs['third_day']; ?>' size='15' readyonly />
     </td>

     <td>
       <input type='text' class='calendarSelectDate' name='hs_second_day' value= '<?php echo $hs['second_day']; ?>' size='15' readyonly />
     </td>
     
     <td>
       <input type='text' class='calendarSelectDate' name='hs_next_day' value= '<?php echo $hs['next_day']; ?>' size='15' readyonly />
     </td>
     
     <td>
       <input type='submit' value='update' />
     </td>
    </tr>
  </table>
  </form>


  <div style="clear: both"></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>