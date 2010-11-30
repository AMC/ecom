<?php include("layout/_layout_top.php"); ?>
<?php include("layout/_layout_menu.php"); ?>
<?php include("layout/_layout_flash.php"); ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>
  
  
  <h3> Reset Password </h3>
    
  <p> If you have lost or forgotten your password, fill in your email address below and click reset password.</p>
  <p> A new password will be generated and emailed to the address below. </p>
  <form id="registration_form" method="post" action="user.php">
    <p>
  		<label for="email">email: </label> <br />
  		<input type="text" name="email" size="30" />
  	</p>

  	  <input type="hidden" name="action" value="reset_password">  	  
  		<input type="submit" class='button' value="reset password" /> <br />

  	</p>
  </form>
  <br />
  

  
  
  </div>
  
  <div class='content_bottom'>
  </div>


<div style="clear: both">
</div>


</div>

<?php include("layout/_layout_bottom.php"); ?>