<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<hr />  

<hr />


<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>
  
  <div style='width: 45%; float: left; '>  
    <h3> Update Password </h3>
    <br />
  
    <form id="registration_form" method="post" action="user.php">
      <p>
    		<label for="old_password">old password: </label> <br />
    		<input type="password" name="old_password" size="30" />
    	</p>
      <p>
    		<label for="password">new password: </label> <br />
    		<input type="password" name="password" size="30" />
    	</p>
    	<p>
    		<label for="password_confirmation">password confirmation: </label> <br />
    		<input type="password" name="password_confirmation" size="30" />
    	</p>


    	  <input type="hidden" name="action" value="update_password">  	  
    		<input type="submit" class='button' value="update password" /> <br />

    	</p>
    </form>
  </div>
  
  <div style='width: 45%; padding-left: 50px; float: right; border-left: 1px solid #DDD;'>
    <h3> Update User Information </h3>  
    <br />
    <form id="registration_form" method="post" action="user.php">
    	<p>
    		<label for="email">email: </label> <br />
    		<input type="text" name="email" size="30" value="<?php echo $_SESSION['user']['email']; ?>" />
    	</p>
      <p>
    		<label for="first_name">first name: </label> <br />
    		<input type="text" name="first_name" size="30" value="<?php echo $_SESSION['user']['first_name']; ?>" />
    	</p>
    	<p>
    		<label for="last_name">last name: </label> <br />
    		<input type="text" name="last_name" size="30" value="<?php echo $_SESSION['user']['last_name']; ?>" />
    	</p>
    	<p>
    		<label for="zip_code">zip code: </label> <br />
    		<input type="text" name="zip_code" size="30" maxlength="5" value="<?php echo $_SESSION['user']['zip_code']; ?>" />
    	</p>
    	<p>
    	  <input type="hidden" name="action" value="update_user">  	  
    		<input type="submit" class='button' value="update account" /> <br />

    	</p>
    </form>
    
  </div>

    <div style="clear: both">
    </div>

  
  </div>
  
  <div class='content_bottom'>
  </div>


<div style="clear: both">
</div>


</div>

<?php include("layout/_layout_bottom.php"); ?>