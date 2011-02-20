
<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id="container">
  <?php $view = str_replace('_', ' ', $view); ?>
  <h3> Category Contents: <?php echo $view?> </h3>
  <form action="/admin.php?action=update_categories&view=<?php echo $_REQUEST['view'] ?>" method="post" >
  <table style='width: 100%; vertical-align: text-bottom;'>
    <th>Product</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Cost</th>
    <th></th>

  <?php $products = $db->query("SELECT id, name, quantity, price, cost FROM products WHERE category='$view' AND discontinued=FALSE ORDER BY name"); ?>    
  <?php while ($product = $products->fetch_array(MYSQLI_ASSOC)) {?>
    <tr>
      <td>
        <input type='text' name='product[<?php echo $product['id']; ?>][name]' value='<?php echo $product['name']; ?>' />
      </td>
      <td>
        <input type='text' name='product[<?php echo $product['id']; ?>][quantity]' value='<?php echo $product['quantity']; ?>' />
      </td>
      <td>
        <input type='text' name='product[<?php echo $product['id']; ?>][price]' value='<?php echo $product['price']; ?>' />
      </td>
      <td>
        <input type='text' name='product[<?php echo $product['id']; ?>][cost]' value='<?php echo $product['cost']; ?>' />
      </td>
      <td></td>
    </tr>
    
    
  <?php }?>
    <tr>
      <td colspan="3"></td>
      
      <td><input type="submit" name="some_name" value="Update" /></td>
    </tr>

  </table>
  </form>
  <br />
  


  <div style="clear: both"></div>
</div>

<?php include("layout/footer.php"); ?>