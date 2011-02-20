<table style='text-align: center; width: 100%;'>
  <th>Order</th>
  <th>Date</th>
  <th>Customer</th>
  <th>Status</th>
  <th>Amount </th>
  <th></th>



  <tr>
    <td>
      <form action='admin.php' method='POST' style='display:inline;'>
      <input type='text' name='order_id' size='4' value='<?php echo $order_id; ?>' />
    </td>
    <td>
      <input type='text' name='date_low' size='6'value='<?php echo $date_low; ?>'  /> 
      to <input type='text' name='date_high' size='6' value='<?php echo $date_high; ?>' />
    </td>
    <td>
      <input type='text' name='customer_name' size='15' value='<?php echo $customer_name; ?>' />
    </td>
    <td>
      <?php order_status($order_status); ?>
    </td>
    <td>
      $<input type='text' name='amt_low' size='3' value='<?php echo $amt_low; ?>' />
      - $<input type='text' name='amt_high' size='3' value='<?php echo $amt_high; ?>' />
    </td>
    <td>
      <input type='submit' value='Go!' />
      </form>
      
      <form action='admin.php' method='POST' style='display:inline;'>
      <input type='submit' value='Clear' />
    </td>
  </tr>



<?php include('admin/refine_order.php'); ?>

<?php $orders = $db->query($order_query); ?>
<?php while ($order = $orders->fetch_array(MYSQLI_ASSOC) ) { ?>
  <tr>
    <td style='width: 70px;'> 
      <a href="admin.php?action=order_details&cart_id=<?php echo $order['id']; ?>"> <?php echo $order['id']; ?></a>
    </td>
    <td style='width: 170px;'> <?php echo substr($order['created'], 0, 10); ?> </td>
    <td style='width: 200px;'>
      <a href="admin.php?action=customer_details&customer_name=<?php echo $order['name']; ?>"> <?php echo $order['name']; ?> </a>
    </td>
    <td style='width: 100px;'> <?php echo $order['status']; ?> </td>
    <td style='width: 120px; text-align: right; padding-right: 20px;'> <?php echo $order['total']; ?> </td>
    <td>
      <?php $ups_label = "ups_labels/" . $order['id'] . ".gif"; ?>
      <?php if ( file_exists($ups_label)) { echo "<a href='$ups_label' target='_blank'>[shipping]</a>"; }?>
      <a href="admin.php?action=invoice&cart_id=<?php echo $order['id']; ?>" target='_blank'>[invoice]</a>
   
   
    </td>
<?php } ?>




</table>