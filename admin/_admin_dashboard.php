<?php $stylesheets[] = 'cart.css'; ?>

<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>


<link rel="stylesheet" type="text/css" media="all" href="javascript/jsDatePick_ltr.min.css" />

<script type="text/javascript" src="javascript/jquery.1.4.2.js"></script>
<script type="text/javascript" src="javascript/jsDatePick.jquery.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"date_low",
			dateFormat:"%Y-%m-%d"
		});
		new JsDatePick({
			useMode:2,
			target:"date_high",
			dateFormat:"%Y-%m-%d"
		});
	};
</script>

<div id="container">
  <h3> Admin Dashboard </h3>

  
  <form action='admin.php' method='post'>
  <?php $notes = $db->query("SELECT id, name, note FROM notes WHERE name='dashboard'"); ?>
  <?php $note = $notes->fetch_array(MYSQLI_ASSOC); ?>
    Notes: <br />
    <textarea style='width: 100%' name='note'><?php echo $note['note']; ?></textarea>
    <br />
    <input type='hidden' name='note_name' value='<?php echo $note['name']; ?>' />
    <input type='hidden' name='return_url' value='admin.php' />
    <input type='hidden' name='action' value='update_note'>
    <input type='submit' value='save' />
  </form>

  <br />

  <table style='width: 30%; float: left;'>
    <tr>
      <td>Today's sales:</td>
      <td style='text-align: right; '> 
        <?php $sales_array = $db->query("SELECT SUM(total) FROM cart WHERE created=CURDATE() AND status IN ('Pending', 'Shipped', 'Delivered')")->fetch_row(); ?>
        <?php $sales = $sales_array[0]; ?>
        <?php echo money_format('%(#10n', $sales); ?>
      </td>

    </tr>
    <tr>
      <td>Yesterday's sales:</td>
      <td style='text-align: right; '> 
        <?php $sales_array = $db->query("SELECT SUM(total) FROM cart WHERE created=DATE_ADD(CURDATE(), INTERVAL -1 DAY) AND status IN ('Pending', 'Shipped', 'Delivered')")->fetch_row(); ?>
        <?php $sales = $sales_array[0]; ?>
        <?php echo money_format('%(#10n', $sales); ?>
      </td>
    </tr>
    <tr>
      <td>This month's sales:</td>
      <td style='text-align: right; '> 
        <?php $current_month = date('m'); ?>
        <?php $sales_array = $db->query("SELECT SUM(total) FROM cart WHERE month(created)=$current_month AND status IN ('Pending', 'Shipped', 'Delivered')")->fetch_row(); ?>
        <?php $sales = $sales_array[0]; ?>
        <?php echo money_format('%(#10n', $sales); ?>
      </td>
    </tr>
    <tr>
      <td>Last month's sales:</td>
      <td style='text-align: right; '> 
        <?php $last_month = date('m') - 1; if ($last_month == 0) {$last_month = 12;}   ?>
        <?php $sales_array = $db->query("SELECT SUM(total) FROM cart WHERE month(created)=$last_month AND status IN ('Pending', 'Shipped', 'Delivered')")->fetch_row(); ?>
        <?php $sales = $sales_array[0]; ?>
        <?php echo money_format('%(#10n', $sales); ?>
      </td>
    </tr>
  </table>

  <table style='width: 30%; float: left; margin-left: 5%; margin-right: 5%; text-align: center'>
    <th>Current Promotions: </th>
    <tr>
      <td>xxx</td>
    </tr>
    <tr>
      <td>xxx</td>
    </tr>
  </table>
  
  <table style='width: 30%; float: left;'>
    <tr>
      <td><a href='admin.php?order_status=Pending'>Pending Orders</a>:</td>
      <td style='text-align: right; '> 
        <?php $count_array = $db->query("SELECT COUNT(*) FROM cart WHERE status='Pending'")->fetch_row(); ?>
        <?php $count = $count_array[0]; ?>
        <?php echo $count; ?>
      </td>
    </tr>

    <tr>
      <td><a href='admin.php?order_status=Shipped'>Shipped</a>:</td>
      <td style='text-align: right; '> 
        <?php $count_array = $db->query("SELECT COUNT(*) FROM cart WHERE status='Shipped'")->fetch_row(); ?>
        <?php $count = $count_array[0]; ?>
        <?php echo $count; ?>
      </td>

    </tr>
    <tr>
      <td><a href='admin.php?order_status=Delivered'>Delivered</a>:</td>
      <td style='text-align: right; '> 
        <?php $count_array = $db->query("SELECT COUNT(*) FROM cart WHERE status='Delivered'")->fetch_row(); ?>
        <?php $count = $count_array[0]; ?>
        <?php echo $count; ?>
      </td>

    </tr>
  </table>

  <div style='clear: both;'> </div>
  <br />

  
  <?php include("admin/show_orders.php"); ?>

  <br />  

  <div style="clear: both">
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>