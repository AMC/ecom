<?php include('layout/header.php'); ?>
<?php include('layout/menu.php'); ?>
<?php include('layout/flash_message.php'); ?>

<div id='container'>

<div class='split_screen_left'>
  <form id='registration_form' method='post' action='user.php'>
  	<p>
  		<label for='email'>email (this will be your username): </label> <br />
  		<input type='text' name='email' class='text' size='30' value='<?php echo $email?>' />
  	</p>
    <p>
  		<label for='password'>password: </label> <br />
  		<input type='password' name='password' class='text' size='30' />
  	</p>
  	<p>
  		<label for='password_confirmation'>password confirmation: </label> <br />
  		<input type='password' name='password_confirmation' class='text' size='30' />
  	</p>
  	<p>
    <p>
  		<label for='first_name'>first name: </label> <br />
  		<input type='text' name='first_name' class='text' size='30' value='<?php echo $first_name?>' />
  	</p>
  	<p>
  		<label for='last_name'>last name: </label> <br />
  		<input type='text' name='last_name' class='text' size='30' value='<?php echo $last_name?>' />
  	</p>
  	<p>
  		<label for='zip_code'>zip code: </label><br />
  		<input type='text' name='zip_code' class='text' size='30' maxlength='5' value='<?php echo $zip_code?>' />
  	</p>
  	<p>
  	  <div class='button_div'>
    	  <input type='hidden' name='action' value='create_user'>  	  
    		<input type='submit' class='button' value='register' /> <br />
      </div>
  	</p>
  </form>
</div>
  
<div class='split_screen_right'>
  &nbsp;
</div>

<div style='clear: both'>
</div>


</div>

<?php include('layout/footer.php'); ?>