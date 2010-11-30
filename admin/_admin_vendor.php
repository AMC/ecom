<?php $stylesheets[] = 'invoice.css'; ?>


<?php $cart_items = $db->query("SELECT product_id, quantity, options FROM cart_products WHERE cart_id='$cart_id'"); ?>
<?php $cart = $db->query("SELECT * FROM cart WHERE id='$cart_id'"); ?>
<?php $cart = $cart->fetch_array(MYSQLI_ASSOC); ?>
<?php $order_total = 0; ?>

<div id="container">
  <h3>Vendor Invoice</h3>

  <table id="shipping" style='width: 45%; float: left'>
    <th colspan='2'> Shipping Information: </th>
    <tr>
      <td>Name:</td>
      <td>ABC Company </td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td><?php echo $cart['phone'];?> </td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $cart['address'];?> </td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo $cart['address2'];?> </td>
    </tr>
    <tr>
      <td>City, State, Zip:</td>
      <td><?php echo $cart['city'] . ", " . $cart['state'] . " " . $cart['zip_code'];?> </td>
    </tr>

  </table>  

        
  <div style='clear: both;'>
  </div>
    
  <hr />
  
  
  <table id='cart'>
    <th style="width: 180px;"> Quantity </th>
    <th style="width: 200px;"> Product </th>
    <th style="width: 300px;"> </th>
    <th style="width: 100px;"> Price </th>
    <th style="width: 120px;"></th>
        
    
    <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
      <tr>
        <td style="text-align: center ">
          <?php $product = product($db, $cart_item['product_id']); ?>
          <?php $product_subtotal = $cart_item['quantity'] * $product['price']; ?>
          <?php $order_total = $order_total + $product_subtotal; ?>

          <?php echo $cart_item['quantity']; ?>
        </td>
        <td>
          <?php echo $product['name']; ?>
        </td>
        <td>
          <?php echo $cart_item['options']; ?>
        </td>
        <td style="text-align: right;">$<?php echo $product['price']; ?></td>
        <td style="text-align: right;">$<?php echo $product_subtotal; ?></td>
        <td></td>
      </tr>
    <?php } ?>  
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td style='text-align: right;'>Total: </td>
      <td style='text-align: right;'> <?php if ($order_total > 0 ) { echo $order_total;} ?>
    </tr>
  </table>


  <div style="clear: both">
  </div>
</div>

