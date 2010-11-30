<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>
    
  <form id="registration_form" method="post" action="user.php">
  	<p>
  		<label for="email">email (this will be your username): </label> <br />
  		<input type="text" name="email" size="30" value="<?php echo $email?>" />
  	</p>
    <p>
  		<label for="password">password: </label> <br />
  		<input type="password" name="password" size="30" />
  	</p>
  	<p>
  		<label for="password_confirmation">password confirmation: </label> <br />
  		<input type="password" name="password_confirmation" size="30" />
  	</p>
  	<p>
    <p>
  		<label for="first_name">first name: </label> <br />
  		<input type="text" name="first_name" size="30" value="<?php echo $first_name?>" />
  	</p>
  	<p>
  		<label for="last_name">last name: </label> <br />
  		<input type="text" name="last_name" size="30" value="<?php echo $last_name?>" />
  	</p>
  	<p>
  		<label for="zip_code">zip code: </label> (for international users use: 00000)<br />
  		<input type="text" name="zip_code" size="30" maxlength="5" value="<?php echo $zip_code?>" />
  	</p>
  	<p>
  	  <input type="hidden" name="action" value="create_user">  	  
  		<input type="submit" class='button' value="register" /> <br />

  	</p>
  </form>
  
  </div>
  
  <div class='content_bottom'>
  </div>


<div style="clear: both">
</div>


</div>

<?php include("layout/_layout_bottom.php"); ?>