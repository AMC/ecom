
<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<?php $categories = $db->query("SELECT category FROM shipping WHERE id='$shipping_id'"); ?>
<?php $category = $categories->fetch_array(MYSQLI_ASSOC); ?>

<div id="container">
  <h3> Products in Shipping Category <?php echo $category['category']; ?> </h3>
  
  <table>
    <th>Name</th>
    <th>Category</th>
    <th>Collection</th>
    <th>Price</th>
    <th></th>
  
  <?php $products = $db->query("SELECT id, name, category, collection, shipping_category, price, discontinued FROM products WHERE shipping_category='$shipping_id' and discontinued!=1"); ?>
  <?php while ($product = $products->fetch_array(MYSQLI_ASSOC)) { ?>


    <tr>
      <td>
        <?php echo $product['name']; ?>
      </td>
      <td>
        <?php echo $product['category']; ?>
      </td>
      <td>
        <?php echo $product['collection']; ?>
      </td>
      <td style='text-align: right;'>
        <?php echo money_format('%(#10n', $product['price']); ?>
      </td>
      <td>
        <form action='catalog.php' method='post'>
        <input type='hidden' name='product_id' value='<?php echo $product['id']; ?>' />
        <input type='hidden' name='action' value='view_product'>
          <input type='submit' value='update' />
        </form>
      </td>

      </td>
    </tr>

  <?php }?>
  </table>
  


  <div style="clear: both"></div>
</div>

<?php include("layout/_layout_bottom.php"); ?>