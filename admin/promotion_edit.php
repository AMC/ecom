<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>


<?php $promotions = $db->query("SELECT * FROM promotions WHERE id = '$promo_id'"); ?>
<?php $promotion = $promotions->fetch_array(MYSQLI_ASSOC); ?>

<div id="container">
  <h3> Edit Promotion </h3>
  
<form action='admin.php' method='POST'>  
<div style='float: left; width: 30%;'>
    Promotion Name: <br />
    <input type='text' name='promo_name' size='20' value='<?php echo $promotion['name']?>' /> <br />
    <br />
    Promotion Code: <br />
    <input type='text' name='promo_code' size='20' value='<?php echo $promotion['promo_code']?>' /><br />
    <br />
    Display Message: <br />
    <input type='text' name='promo_message' size='20' value='<?php echo $promotion['message']?>' /> <br />
    <br />
</div>

<div style='float: left; width: 30%; border-left: 1px solid #DDD; padding-left: 30px;'>
  Start:<br />
  <input class='calendarSelectDate' type='text' id='promo_start' name='promo_start' readonly='readonly' size='20' value='<?php echo $promotion['start']?>' /><br />
  <br />
  End:<br />
  <input class='calendarSelectDate' type='text' id='promo_end' name='promo_end' readonly='readonly' size='20' value='<?php echo $promotion['end']?>' /><br />
  <br />
  <div id="calendarDiv"></div>

</div>

<div style='float: left; width: 30%; border-left: 1px solid #DDD; padding-left: 30px;'>
    Minimum Purchase: <br />
    <input type='text' name='promo_min' size='20' value='<?php echo $promotion['min_amount']?>' /><br />
    <br />
    Discount: (must be one or the other) <br />
    <input type='text' name='promo_percent' size='6' value='<?php echo $promotion['discount_percent']?>' />% 
    &nbsp; &nbsp; OR &nbsp; &nbsp; 
    $<input type='text' name='promo_amount' size='6' value='<?php echo $promotion['discount_amount']?>' /><br />
    <br />
    <?php if ($promotion['storewide'] == TRUE) { ?>
      <input type='checkbox' name='promo_storewide' checked='checked' /> Storewide Sale
    <?php } else { ?>
      <input type='checkbox' name='promo_storewide' /> Storewide Sale 
    <?php } ?>

    <br />

</div>

<div style='clear: both; width: 95%; text-align: right; border-bottom: 1px solid #DDD; margin-bottom: 20px;'>
  <input type='hidden' name='promo_id' value='<?php echo $promo_id; ?>' />
  <input type='hidden' name='action' value='update_promotion' />
  <input type='submit' value='Update' />
  <br /><br />
</div>
</form>





<div style='float: left; width: 32%; border-left: 1px solid #DDD; padding-left: 10px;'>
  <table style='width: 100%;'>
    <th> Categories </th>
    <tr>
      
      <td>
        <?php $categories = $db->query("SELECT DISTINCT(category) FROM products WHERE discontinued IS FALSE ORDER BY category"); ?>
        <form action='admin.php' method='post'>
          <select name='promo_item' style='width: 70%;'>
          <option></option>

           <?php while ($category = $categories->fetch_array(MYSQLI_ASSOC) ) { ?>
              <option><?php echo $category['category']; ?></option>
            <?php } ?>
          </select>
  
          <input type='hidden' name='promo_type' value='Category' />
          <input type='hidden' name='promo_id' value='<?php echo $promo_id;?>' />
          <input type='hidden' name='action' value='add_promo_item' />
          <input type='submit' value='add' />
        </form>
    </tr>
    
    <?php $promo_items = $db->query("SELECT id, type, item FROM promo_items WHERE promo_id = $promo_id AND type='Category' ORDER BY item"); ?>
    <?php while ( $promo_item = $promo_items->fetch_array(MYSQLI_ASSOC) ) { ?>
      <tr>
        <td style='text-align: right;'>
          <?php echo $promo_item['item']; ?>
            <form action='admin.php' method='post' style='display: inline;'>
              <input type='hidden' name='promo_id' value='<?php echo $promo_id; ?>'>
              <input type='hidden' name='promo_type' value='<?php echo $promo_item['type']; ?>' />
              <input type='hidden' name='promo_item' value='<?php echo $promo_item['item'];?>' />
              <input type='hidden' name='promo_item_id' value='<?php echo $promo_item['id'];?>' />
              <input type='hidden' name='action' value='delete_promo_item' />
              &nbsp; &nbsp; &nbsp;
              <input type='submit' value='delete' />
            </form>
          </td>
        </td>

      </tr>
    <?php } ?>
    
  </table>
  
</div>

<div style='float: left; width: 32%; border-left: 1px solid #DDD; padding-left: 10px;'>
  <table style='width: 100%;'>
    <th> Manufacturers </th>
    <tr>
      
      <td>
        <?php $manufacturers = $db->query("SELECT DISTINCT(manufacturer) FROM products WHERE discontinued IS FALSE ORDER BY manufacturer"); ?>
        <form action='admin.php' method='post'>
          <select name='promo_item' style='width: 70%;'>
          <option></option>

           <?php while ($manufacturer = $manufacturers->fetch_array(MYSQLI_ASSOC) ) { ?>
              <option><?php echo $manufacturer['manufacturer']; ?></option>
            <?php } ?>
          </select>
          
          <input type='hidden' name='promo_type' value='Manufacturer' />
          <input type='hidden' name='promo_id' value='<?php echo $promo_id;?>' />
          <input type='hidden' name='action' value='add_promo_item' />
          <input type='submit' value='add' />
        </form>
    </tr>
    <?php $promo_items = $db->query("SELECT id, type, item FROM promo_items WHERE promo_id = $promo_id AND type='Manufacturer' ORDER BY item"); ?>
    <?php while ( $promo_item = $promo_items->fetch_array(MYSQLI_ASSOC) ) { ?>
      <tr>
        <td style='text-align: right;'>
          <?php echo $promo_item['item']; ?>
            <form action='admin.php' method='post' style='display: inline;'>
              <input type='hidden' name='promo_id' value='<?php echo $promo_id; ?>'>
              <input type='hidden' name='promo_type' value='<?php echo $promo_item['type']; ?>' />
              <input type='hidden' name='promo_item' value='<?php echo $promo_item['item'];?>' />
              <input type='hidden' name='promo_item_id' value='<?php echo $promo_item['id'];?>' />
              <input type='hidden' name='action' value='delete_promo_item' />
              &nbsp; &nbsp; &nbsp;
              <input type='submit' value='delete' />
            </form>
          </td>
        </td>

      </tr>
    <?php } ?>    
    
    
  </table>
  
</div>

<div style='float: left; width: 32%; border-left: 1px solid #DDD; padding-left: 10px;'>
  <table style='width: 100%;'>
    <tr>
      <th> Products </th>
    </tr>
    <tr>
     <th style='font-size: 12px'>by manufacturer reference</th>
    </tr>
    <tr>
      
      <td>

        <form action='admin.php' method='post'>
          <input type='text' name='promo_item' style='width: 70%;'>
          
          <input type='hidden' name='promo_type' value='Product' />
          <input type='hidden' name='promo_id' value='<?php echo $promo_id;?>' />
          <input type='hidden' name='action' value='add_promo_item' />
          <input type='submit' value='add' />
        </form>
    </tr>
    <?php $promo_items = $db->query("SELECT id, type, item FROM promo_items WHERE promo_id = $promo_id AND type='Product' ORDER BY item"); ?>
    <?php while ( $promo_item = $promo_items->fetch_array(MYSQLI_ASSOC) ) { ?>
      <tr>
        <td style='text-align: right;'>
          <?php echo $promo_item['item']; ?>
            <form action='admin.php' method='post' style='display: inline;'>
              <input type='hidden' name='promo_id' value='<?php echo $promo_id; ?>'>
              <input type='hidden' name='promo_type' value='<?php echo $promo_item['type']; ?>' />
              <input type='hidden' name='promo_item' value='<?php echo $promo_item['item'];?>' />
              <input type='hidden' name='promo_item_id' value='<?php echo $promo_item['id'];?>' />
              <input type='hidden' name='action' value='delete_promo_item' />
              &nbsp; &nbsp; &nbsp;
              <input type='submit' value='delete' />
            </form>
          </td>
        </td>

      </tr>
    <?php } ?>    
    
    
  </table>
  
</div>



  

  


  <div style="clear: both"></div>
</div>

<?php include("layout/footer.php"); ?>