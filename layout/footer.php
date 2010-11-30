  <div id="footer">
    <a href="index.php">Home</a> |
    <a href='about.php'>About Us</a> |
    <a href='catalog.php'>Products</a> |
    <a href='policies.php'>Policies</a> |
    <a href='partners.php'>Partners <a/> |
    <a href='contact.php'>Contact Us</a>

    <?php if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'TRUE') { ?> 
      | <a href='user.php?action=user_information'>My Information</a>
    <?php } else { ?>
      | <a href="user.php?action=register_user">Register</a> 
    <?php } ?>
    <br />
    Copyright &copy; 2010. All Rights Reserved.
  </div>
</div>

</body>
</html>