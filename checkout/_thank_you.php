<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>

<div id="container">
  
  <div class='full_screen'>

  <h3>Thank you for your order</h3>
  <p>Your order has been submitted. </p>
  <p>After your order is processed, you will receive an email confirmation including a UPS tracking number. </p>
  <p>We hope for your continued patronage and would like to add your email address to our mailing list so we can alert you to upcoming promotions, sales and events.</p>
  <p>May we add you to our mailing list? 
    <a href='checkout.php?action=mailing_list_yes&email=<?php echo $email; ?>' class='button'> YES </a> &nbsp; 
    <a href='checkout.php?action=mailing_list_no&email=<?php echo $email; ?>' class='button'> NO </a></p>
  </div>
  

</div>

<?php include("layout/footer.php"); ?>