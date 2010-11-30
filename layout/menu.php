<div class='menu'>

	<a href='index.php'>Home</a>
    <a href='about.php'>About Us</a>
    <a href='catalog.php'>Products</a>
    <a href='policies.php'>Policies</a>
    <a href='partners.php'>Partners</a>
    <a href='contact.php'>Contact Us</a>

  <?php if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'TRUE') { ?> 
    <a href='user.php?action=user_information'>My Information</a>
    <a href='user.php?action=logout'>Logout</a>
  <?php } else { ?>
    <a href='user.php?action=register_user'>Register</a>
    <a id='login' title='Login' href='#login_form'>Login</a>
  <?php } ?>

</div>

<?php if (role() == 'admin') {?>
  <div id='admin_menu' class='menu' >
    <a href='admin.php'>Dashboard</a>
    <a href='catalog.php?action=new_product'>New Product</a>
    <a href='admin.php?action=promotions'>Sales and Promotions</a>
    <a href='admin.php?action=shipping_table'>Shipping Table</a>
    <a href='admin.php'>Reports</a>
    
  </div>
<?php } ?>

<div style='display:none'>
	<form id='login_form' method='post' action='user.php?action=login'>
		<p>
			<label for='email'>email: </label> <br />
			<input type='text' id='email' name='email' size='30' />
		</p>
		<p>
			<label for='password'>password: </label> <br />
			<input type='password' id='password' name='password' size='30' />
		</p>
		<p>
			<input type='submit' class='button' value='login' />
		</p>
		
		<p>
		  <a href='user.php?action=lost_password'>Forgot password?</a>
		</p>
	</form>
</div>