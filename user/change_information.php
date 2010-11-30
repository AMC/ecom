<?php include("layout/header.php"); ?>
<?php include("layout/menu.php"); ?>
<?php include("layout/flash_message.php"); ?>


<div id="container">
  
  <div class='split_screen_left'>  
    <h1> Update Password </h1>
    <br />
  
    <form id="registration_form" method="post" action="user.php">
      <p>
    		<label for="old_password">old password: </label> <br />
    		<input type="password" name="old_password" class='text' />
    	</p>
      <p>
    		<label for="password">new password: </label> <br />
    		<input type="password" name="password" class='text' />
    	</p>
    	<p>
    		<label for="password_confirmation">password confirmation: </label> <br />
    		<input type="password" name="password_confirmation" class='text' />
    	</p>

      <div class='button_div'>
    	  <input type="hidden" name="action" value="update_password">  	  
    		<input type="submit" class='button' value="update password" /> <br />
      </div>
    	</p>
    </form>
  </div>
  
  <div class='split_screen_right'>
    <h1> Update User Information </h1>  
    <br />
    <form id="registration_form" method="post" action="user.php">
    	<p>
    		<label for="email">email: </label> <br />
    		<input type="text" name="email"  class='text' value="<?php echo $_SESSION['user']['email']; ?>" />
    	</p>
      <p>
    		<label for="first_name">first name: </label> <br />
    		<input type="text" name="first_name" class='text' value="<?php echo $_SESSION['user']['first_name']; ?>" />
    	</p>
    	<p>
    		<label for="last_name">last name: </label> <br />
    		<input type="text" name="last_name" class='text' value="<?php echo $_SESSION['user']['last_name']; ?>" />
    	</p>
    	<p>
    		<label for="zip_code">zip code: </label> <br />
    		<input type="text" name="zip_code" class='text' maxlength="5" value="<?php echo $_SESSION['user']['zip_code']; ?>" />
    	</p>
    	<p>
      <div class='button_div'>
    	  <input type="hidden" name="action" value="update_user">  	  
    		<input type="submit" class='button' value="update account" /> <br />
      </div>
    	</p>
    </form>
    
  </div>

  <div style="clear: both">
  </div>

<div style="clear: both">
</div>


</div>

<?php include("layout/footer.php"); ?>