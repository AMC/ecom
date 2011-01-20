<?php
/***********************************************************
SetExpressCheckout.php

This is the main web page for the Express Checkout sample.
The page allows the user to enter amount and currency type.
It also accept input variable paymentType which becomes the
value of the PAYMENTACTION parameter.

When the user clicks the Submit button, ReviewOrder.php is
called.

Called by index.html.

Calls ReviewOrder.php.

***********************************************************/
// clearing the session before starting new API Call

session_unset();

$paymentType = $_GET['paymentType'];
?>


<html>
<head>
  <title>Shopping Cart Page</title>
</head>

<body>

<div style='width: 500px; margin: 0px auto; text-align: left;'>
  <h3> Step 1: SetExpressCheckout </h3>
  You must be logged into: 
  <a href="https://developer.paypal.com" id="PayPalDeveloperCentralLink"  target="_blank">Developer Central</a> </br>

  <h3>Shopping cart Products:</h3>
	<form action="ReviewOrder.php" method="POST">
  	<input type=hidden name=paymentType value='<?php echo $paymentType?>' >
    <h4>CDs:</h4>
    Price / Quantity / Name <br />
    
		<input type="text" name="L_AMT1" size="5" maxlength="32" value="39.00" /> 
    <input type="text" size="3" maxlength="32" name="L_QTY1" value="2" />
		<input type="text" size="30" maxlength="32" name="L_NAME1" value="Music CD 01" />
    <br /><br />
  
  	<h3>Books:</h3>
    Price / Quantity / Name <br />
		<input type="text" name="L_AMT0" size="5" maxlength="32" value="9.00"  /> 
		<input type="text" size="3" maxlength="32" name="L_QTY0" value="2"  /> 
		<input type="text" size="30" maxlength="32" name="L_NAME0" value="Book 01" /> 
    <br /><br />

		Currency: <br />
  	<select name="currencyCodeType">
		  <option value="USD">USD</option>
			<option value="GBP">GBP</option>
			<option value="EUR">EUR</option>
			<option value="JPY">JPY</option>
			<option value="CAD">CAD</option>
			<option value="AUD">AUD</option>
		</select>     
		<br /><br />

		<h4>Ship To:</h4>
		Name:<br />
		<input type="text" size="30" maxlength="32" name="PERSONNAME" value="Andrew Canfield" /><br />

		Street: <br />
		<input type="text" size="30" maxlength="32" name="SHIPTOSTREET" value="111, Bliss Ave" /><br />

		City: <br />
		<input type="text" size="30" maxlength="32" name="SHIPTOCITY" value="San Jose" /><br />

		State: <br />
		<input type="text" size="30" maxlength="32" name="SHIPTOSTATE" value="CA" /><br />

		Country:<br />
		<input type="text" size="30" maxlength="32" name="SHIPTOCOUNTRYCODE" value="US" /><br />

		Zip Code:<br />
		<input type="text" size="30" maxlength="32" name="SHIPTOZIP" value="95128" /><br />

    <br />
		<input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" /> <br />

  </form>
  
  <a class="home" id="CallsLink" href="index.html">Home</a>
    
</body>
</html>
