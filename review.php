<?php
/*==================================================================
 PayPal Express Checkout Call
 ===================================================================
*/
// Check to see if the Request object contains a variable named 'token'	
session_start();


?>
<?php 
  include_once("config/initialize.php"); 
  include_once("config/database.php"); 
  include_once("config/functions.php"); 

  $stylesheets[] = 'cart.css';
  $stylesheets[] = 'categories.css';
  include("layout/header.php");
  include("layout/menu.php"); 
  include("layout/flash_message.php"); ?>

<div id="container">
  
  <div class='content_top_fancy'>
  </div>
  
  <div class='content'>
    <?php $cart_id = cart_id($db);
    $token = "";
    if (isset($_REQUEST['token']))
    {
    	$token = $_REQUEST['token'];
    }

    // If the Request object contains the variable 'token' then it means that the user is coming from PayPal site.	
    if ( $token != "" )
    {

    	require_once ("paypalfunctions.php");

    	/*
    	'------------------------------------
    	' Calls the GetExpressCheckoutDetails API call
    	'
    	' The GetShippingDetails function is defined in PayPalFunctions.jsp
    	' included at the top of this file.
    	'-------------------------------------------------
    	*/


    	$resArray = GetShippingDetails( $token );
    	$ack = strtoupper($resArray["ACK"]);
    	if( $ack == "SUCCESS" || $ack == "SUCESSWITHWARNING") 
    	{
    		/*
    		' The information that is returned by the GetExpressCheckoutDetails call should be integrated by the partner into his Order Review 
    		' page		
    		*/
    		$email 				= $resArray["EMAIL"]; // ' Email address of payer.
    		$payerId 			= $resArray["PAYERID"]; // ' Unique PayPal customer account identification number.
    		$payerStatus		= $resArray["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.
    		$salutation			= $resArray["SALUTATION"]; // ' Payer's salutation.
    		$firstName			= $resArray["FIRSTNAME"]; // ' Payer's first name.
    		$middleName			= $resArray["MIDDLENAME"]; // ' Payer's middle name.
    		$lastName			= $resArray["LASTNAME"]; // ' Payer's last name.
    		$suffix				= $resArray["SUFFIX"]; // ' Payer's suffix.
    		$cntryCode			= $resArray["COUNTRYCODE"]; // ' Payer's country of residence in the form of ISO standard 3166 two-character country codes.
    		$business			= $resArray["BUSINESS"]; // ' Payer's business name.
    		$shipToName			= $resArray["SHIPTONAME"]; // ' Person's name associated with this address.
    		$shipToStreet		= $resArray["SHIPTOSTREET"]; // ' First street address.
    		$shipToStreet2		= $resArray["SHIPTOSTREET2"]; // ' Second street address.
    		$shipToCity			= $resArray["SHIPTOCITY"]; // ' Name of city.
    		$shipToState		= $resArray["SHIPTOSTATE"]; // ' State or province
    		$shipToCntryCode	= $resArray["SHIPTOCOUNTRYCODE"]; // ' Country code. 
    		$shipToZip			= $resArray["SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
    		$addressStatus 		= $resArray["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal   
    		$invoiceNumber		= $resArray["INVNUM"]; // ' Your own invoice or tracking number, as set by you in the element of the same name in SetExpressCheckout request .
    		$phonNumber			= $resArray["PHONENUM"]; // ' Payer's contact telephone number. Note:  PayPal returns a contact telephone number only if your Merchant account profile settings require that the buyer enter one. 
    	} 
    	else  
    	{
    		//Display a user friendly Error on the page using any of the following error information returned by PayPal
    		$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
    		$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
    		$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
    		$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

    		echo "GetExpressCheckoutDetails API call failed. ";
    		echo "Detailed Error Message: " . $ErrorLongMsg;
    		echo "Short Error Message: " . $ErrorShortMsg;
    		echo "Error Code: " . $ErrorCode;
    		echo "Error Severity Code: " . $ErrorSeverityCode;
    	}
    }
    $cart_items = $db->query("SELECT products.id, products.name, products.price, cart_products.apply_discount, cart_products.quantity, cart_products.options FROM cart_products, products WHERE cart_products.cart_id='$cart_id' AND cart_products.product_id = products.id "); ?>
    
    <table id='cart'>
      <tr>
        <th style="width: 180px;"> Quantity </th>
        <th style="width: 300px;"> Product </th>
        <th style="width: 100px; text-align: right;"> Price </th>
        <th> Total </th>
      </tr>
      
      <?php while ($cart_item = $cart_items->fetch_array(MYSQLI_ASSOC)) { ?>
        <?php if ($cart_item['apply_discount'] == 1) { $subtotal_discount =  $subtotal_discount + ($cart_item['price'] * $cart_item['quantity']); } ?>
        <?php $subtotal_products = $subtotal_products + $cart_item['quantity'] * $cart_item['price']; ?>      

        <tr>
          <td style="text-align: center ">
            <?php echo $cart_item['quantity']; ?>
          </td>

          <td>
            <?php echo $cart_item['name']; ?>
            <?php $option_ids = explode(",", $cart_item['options']); ?>

            <? foreach ($option_ids as $option_id) {?>
                <?php $options = $db->query("SELECT option_name, options, price_impact FROM product_options WHERE id='$option_id'")?>
                <?php while ($option = $options->fetch_array(MYSQLI_ASSOC)) { ?>
                  <?php if ( $option['price_impact'] == 0 ) { $price_impact = ""; } else {$price_impact = " + " . $option['price_impact'];} ?>
                  <?php echo " - " . $option['options'] . $price_impact ?>

                <?php } ?>
            <? } ?>  
          </td>

          <td style="text-align: right;">
            <?php echo money_format('%(#10n', $cart_item['price']); ?>
          </td>

          <td style="text-align: right;">

            <?php echo money_format('%(#10n', $cart_item['price'] * $cart_item['quantity']); ?>
          </td>


        </tr>

      <?php } ?>
      <tr>
        <td colspan="2">Total</td>
        <td><?php echo($_SESSION["Payment_Amount"]) ?></td>
      </tr>
      </table>
      
      <a href="confirm.php">Confirm Your Order</a>
    
    <div style="clear: both">
      &nbsp;
    </div>

  </div>

  <div class='content_bottom'>
  </div>

  <div style="clear: both">
  </div>
</div>

<?php include("layout/footer.php"); ?>