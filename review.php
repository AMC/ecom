<?php

include_once("config/initialize.php"); 
include_once("config/database.php"); 
include_once("config/functions.php");

$cart_id = cart_id($db);


/*==================================================================
 PayPal Express Checkout Call
 ===================================================================
*/
// Check to see if the Request object contains a variable named 'token' 
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
        $email = $payerId = $payerStatus = $salutation = $firstName = $lastName = $suffix = $cntryCode = $business = $shipToName = $shipToStreet = $shipToStreet2 = $shipToCity = $shipToState = $shipToZip = $shipToCntryCode = $addressStatus = $invoiceNumber = $phonNumber = "";
        
        
        if ( isset($resArray['EMAIL']))
          $email              = $resArray["EMAIL"]; // ' Email address of payer.

        if ( isset($resArray['PAYERID']))
          $payerId            = $resArray["PAYERID"]; // ' Unique PayPal customer account identification number.
        
        if ( isset($resArray['PAYERSTATUS']))
          $payerStatus        = $resArray["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.

        if ( isset($resArray['SALUTATION']))
          $salutation         = $resArray["SALUTATION"]; // ' Payer's salutation.
          
        if ( isset($resArray['FIRSTNAME']))
          $firstName          = $resArray["FIRSTNAME"]; // ' Payer's first name.
        
        if ( isset($resArray['MIDDLENAME']))
          $middleName         = $resArray["MIDDLENAME"]; // ' Payer's middle name.
        
        if ( isset($resArray['LASTNAME']))
          $lastName           = $resArray["LASTNAME"]; // ' Payer's last name.
        
        if ( isset($resArray['SUFFIX']))
          $suffix             = $resArray["SUFFIX"]; // ' Payer's suffix.
        
        if ( isset($resArray['COUNTRYCODE']))
          $cntryCode          = $resArray["COUNTRYCODE"]; // ' Payer's country of residence in the form of ISO standard 3166 two-character country codes.
        
        if ( isset($resArray['BUSINESS']))
          $business           = $resArray["BUSINESS"]; // ' Payer's business name.
        
        if ( isset($resArray['SHIPTONAME']))
          $shipToName         = $resArray["SHIPTONAME"]; // ' Person's name associated with this address.
        
        if ( isset($resArray['SHIPTOSTREET']))
          $shipToStreet       = $resArray["SHIPTOSTREET"]; // ' First street address.
        
        if ( isset($resArray['SHIPTOSTREET2']))
          $shipToStreet2      = $resArray["SHIPTOSTREET2"]; // ' Second street address.
        
        if ( isset($resArray['SHIPTOCITY']))
          $shipToCity         = $resArray["SHIPTOCITY"]; // ' Name of city.
        
        if ( isset($resArray['SHIPTOSTATE']))
          $shipToState        = $resArray["SHIPTOSTATE"]; // ' State or province
        
        if ( isset($resArray['SHIPTOCOUNTRYCODE']))
          $shipToCntryCode    = $resArray["SHIPTOCOUNTRYCODE"]; // ' Country code. 
  
        if ( isset($resArray['SHIPTOZIP']))
          $shipToZip          = $resArray["SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
        
        if ( isset($resArray['ADDRESSSTATUS']))
          $addressStatus      = $resArray["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal   
        
        if ( isset($resArray['INVNUM']))
          $invoiceNumber      = $resArray["INVNUM"]; // ' Your own invoice or tracking number, as set by you in the element of the same name in SetExpressCheckout request .

        if ( isset($resArray['PHONENUM']))
          $phonNumber         = $resArray["PHONENUM"]; // ' Payer's contact telephone number. Note:  PayPal returns a contact telephone number only if your Merchant account profile settings require that the buyer enter one. 
          
          
        $sql = "UPDATE cart 
                  SET name      = '$shipToName',
                      email     = '$email',
                      address   = '$shipToStreet',
                      address2  = '$shipToStreet2', 
                      city      = '$shipToCity',
                      state     = '$shipToState', 
                      zip_code  = '$shipToZip',
                      phone     = '$phonNumber',
                      created   = CURDATE()
                  WHERE id      = '$cart_id';
        ";
        
        //echo $sql . "<br /><br />";
        $db->query($sql);
    } 
    else  
    {
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
        
        $_SESSION['flash'][] = $ErrorShortMsg;
        
    }
}
        
	/*==================================================================
	 PayPal Express Checkout Call
	 ===================================================================
	*/
require_once ("paypalfunctions.php");


	/*
	'------------------------------------
	' The paymentAmount is the total value of 
	' the shopping cart, that was set 
	' earlier in a session variable 
	' by the shopping cart page
	'------------------------------------
	*/
	
	$finalPaymentAmount =  $_SESSION["Payment_Amount"];
		
	/*
	'------------------------------------
	' Calls the DoExpressCheckoutPayment API call
	'
	' The ConfirmPayment function is defined in the file PayPalFunctions.jsp,
	' that is included at the top of this file.
	'-------------------------------------------------
	*/

	$resArray = ConfirmPayment ( $finalPaymentAmount );
	$ack = strtoupper($resArray["ACK"]);
	if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
	{
		/*
		'********************************************************************************************************************
		'
		' THE PARTNER SHOULD SAVE THE KEY TRANSACTION RELATED INFORMATION LIKE 
		'                    transactionId & orderTime 
		'  IN THEIR OWN  DATABASE
		' AND THE REST OF THE INFORMATION CAN BE USED TO UNDERSTAND THE STATUS OF THE PAYMENT 
		'
		'********************************************************************************************************************
		*/
		$transactionId = $transactionType = $orderTime = $amt = $currencyCode = $feeAmt = $settleAmt = $taxAmt = $excangeRate = "";
		

        if ( isset($resArray['TRANSACTIONID']))
		  $transactionId		= $resArray["TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
		
        if ( isset($resArray['TRANSACTIONTYPE']))
    	  $transactionType 	= $resArray["TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
    	  
        if ( isset($resArray['PAYMENTTYPE']))
          $paymentType		= $resArray["PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
          
		if ( isset($resArray['ORDERTIME']))
          $orderTime 			= $resArray["ORDERTIME"];  //' Time/date stamp of payment
		
		if ( isset($resArray['AMT']))
          $amt				= $resArray["AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
		
		if ( isset($resArray['CURRENCYCODE']))
          $currencyCode		= $resArray["CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
		
		if ( isset($resArray['FEEAMT']))
          $feeAmt				= $resArray["FEEAMT"];  //' PayPal fee amount charged for the transaction
		
		if ( isset($resArray['SETTLEAMT']))
          $settleAmt			= $resArray["SETTLEAMT"];  //' Amount deposited in your PayPal account after a currency conversion.
		
		if ( isset($resArray['TAXAMT']))
          $taxAmt				= $resArray["TAXAMT"];  //' Tax charged on the transaction.
		
		if ( isset($resArray['EXCHANGERATE']))
          $exchangeRate		= $resArray["EXCHANGERATE"];  //' Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer’s account.
		
		/*
		' Status of the payment: 
				'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
				'Pending: The payment is pending. See the PendingReason element for more information. 
		*/
		
		if ( isset($resArray['PAYMENTSTATUS']))
          $paymentStatus	= $resArray["PAYMENTSTATUS"]; 
          
        //echo $paymentStatus;

		/*
		'The reason the payment is pending:
		'  none: No pending reason 
		'  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile. 
		'  echeck: The payment is pending because it was made by an eCheck that has not yet cleared. 
		'  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview. 		
		'  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment. 
		'  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment. 
		'  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service. 
		*/
		
		if ( isset($resArray['PENDINGREASON']))
          $pendingReason	= $resArray["PENDINGREASON"];  

		/*
		'The reason for a reversal if TransactionType is reversal:
		'  none: No reason code 
		'  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer. 
		'  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee. 
		'  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer. 
		'  refund: A reversal has occurred on this transaction because you have given the customer a refund. 
		'  other: A reversal has occurred on this transaction due to a reason not listed above. 
		*/
		
		if ( isset($resArray['REASONCODE']))
          $reasonCode		= $resArray["REASONCODE"];   
          

        $sql = "UPDATE cart
                  SET status = 'Ordered',
                      paypal_transaction_id = '$transactionId',
                      paypal_fee = '$feeAmt'
                  WHERE id = '$cart_id' ";
       // echo $sql . "<br /><br />";
       
       $db->query($sql);
       
       $_SESSION['flash'][] = 'Order Submitted';
       include('admin/email_order_received.php');
           

	}
	else  
	{
		//Display a user friendly Error on the page using any of the following error information returned by PayPal
		$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
		$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
		$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
		$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
		
		$_SESSION['flash'][] = $ErrorShortMsg;
 	}


  $db->query("INSERT INTO cart(id) VALUES (null)");
  $_SESSION['cart_id'] = $db->insert_id;
  $cart_id = $_SESSION['cart_id'];
  
  header("Location: index.php");
	
		
?>