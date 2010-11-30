<?php include_once("config/initialize.php"); ?>
<?php include_once("config/database.php"); ?>
<?php include_once("config/functions.php"); ?>

<?php $stylesheets[] = ''; ?>


<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>
    <h2>Policies</h2>
    <br /><br />
    <p>To contact customer service, please e-mail us at orders@havwesternwear.com 
    or you can call us directly at 866-926-2360, Monday through Saturday from 9:30 
    am to 6:00 pm and Sunday from 12:00 pm to 5:00 pm PST.</p>
    <h4>We Ship Anywhere!</h4>
    <p>Shipping within the US: We ship nationwide using UPS or USPS. Shipping 
    charges are based on packages delivered Monday through Friday, within the 
    United States, excluding Alaska and Hawaii.
    Alaska and Hawaii require a flight to their destination, therefore, they can 
    only be shipped via Next day or 2nd Day Air UPS.</p>
    <p>On standard shipping the cost is determined by the weight of the item or 
    items and the zip code destination. The shipping cost also includes materials 
    and special care handling to insure safe arrival of your package(s). Please 
    note that oversized and very heavy items may cost more to ship. We will email 
    you before your order is processed if there are any modifications to your 
    shipping charges.</p>
    <p>All Next Day Air, 2 Day Air, and 3 Day Select (Air) options for shipping 
    will be figured on the shopping cart. Please keep in mind that when sending 
    by air, UPS charges by the size of the box, not by the weight of the package, 
    or the price of the item.</p>

    <div style='width: 100%; text-align: center'>
    <h3>Standard Shipping Costs</h3>
    

    <table id='shipping_table' style='width: 500px; margin: 0px auto;'>
      <th>min</th>
      <th>max</th>
      <th>ground</th>
      <th>third day</th>
      <th>second day</th>
      <th>next day</th>
      <th></th>
      <th></th>

      <?php $prev_max = 0; ?>
      <?php $shipping_tiers = $db->query("SELECT id, tier, max_amt, ground, third_day, second_day, next_day FROM shipping WHERE tier > 0 ORDER BY tier"); ?>
      <?php while ($shipping = $shipping_tiers->fetch_array(MYSQLI_ASSOC)) { ?>

      <input type='hidden' name='prev_max' value='<?php echo $prev_max; ?>' />

      <tr>

        <td>
          <?php echo money_format('%(#10n', $prev_max); ?>
        </td>

        <td>
          <?php echo $shipping['max_amt']; ?>

        </td>

        <td>
          <?php echo $shipping['ground']; ?>
        </td>

        <td>
          <?php echo $shipping['third_day']; ?>
        </td>

        <td>
          <?php echo $shipping['second_day']; ?>
        </td>

        <td>
          <?php echo $shipping['next_day']; ?>
        </td>

        <td>
        </td>

      </tr>
      <?php $prev_max = $shipping['max_amt']; ?>
      <?php } ?>

    </table>
    
    <br />
    <h4>These costs represent an estimate of your shipping costs.</h4>
    <h4>Any changes in shipping prices will be sent by email prior to the shipment of your order.</h4>
    </div>
    
    <h3>Shipping to Canada</h3>
    <p>We use UPS Standard Canada. Due to occasional delays at Canadian customs 
    we cannot guarantee arrival times, and because of unforeseen duties at the 
    border, you are responsible for any applicable duties and/or taxes. Please 
    feel free to call our shipping department with any questions regarding 
    Canadian orders or shipments: 509-924-4945.</p>
    
    <h3>Privacy Policy</h3>
    <p>At HAV Western Wear we are dedicated to ensuring your privacy. At no time
    will we ever sell or exchange names, e-mail addresses, or any other 
    information about our on-line customers. We even take the extra care to shred 
    your credit card numbers on our paper work, so that your credit is never 
    compromised. The personally identifiable information we collect is securely 
    stored within our database and we use standard, industry- wide procedures 
    such as 128 bit encryption and SSL (Secure Sockets Layer) to protect your 
    information.</p>
    
    <h3>Return Policy</h3>
    <p>If you are unhappy with your purchase, before use, for any reason, please 
    contact us for approval of your return. If given authorization, the item must 
    be returned within 14 days of delivery for a full refund. Please note that we 
    cannot return the shipping charges to you unless the return is a result of our 
    error. The item(s) to be returned must be unused, be in the same condition as 
    when sent and in the original packaging materials. Returned merchandise must be 
    shipped back to HAV Western Wear freight prepaid. No freight-collect returns 
    will be accepted. </p>
    
    <h3>Cancellation Policy</h3>
    <p>Any item can be cancelled if HAV Western Wear is notified, before the order 
    has been shipped, via e-mail: orders@havwesternwear.com, by telephone 
    866-926-2360, or by fax (509) 924-4937.</p>
      


    
    
    
    <div style="clear: both">
    </div>

  </div>

  <div class='content_bottom'>
  </div>
</div>

<?php include("layout/_layout_bottom.php"); ?>