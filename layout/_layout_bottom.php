  <div id="footer">
    <a href="index.php">Home</a> |
    <a href="catalog.php">Catalog</a> |
    <a href="cart.php">Cart</a> |
    <a href='aboutus.php'>About Us</a> |
    <a href='policies.php'>Policies</a> |
    <a href='links.php'>Links</a> |

    <?php if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'TRUE') { ?> 
      <a href='user.php?action=user_information'>My Information</a>
    <?php } else { ?>
      <a href="user.php?action=register_user">Register</a> 
    <?php } ?>
    <br />
    Copyright &copy; 2010. HAV Western Wear. All Rights Reserved.
  </div>
</div>

</body>
</html>