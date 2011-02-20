<?
/*
UPS XML Shipping Tool PHP Function Library

file: xmlship.php


*** Copyrights

Ownership rights and intellectual property rights of this software belong to
Sonicode.  This software is protected by copyright laws and treaties. Title and
related rights in the content accessed through the software is the property of
the applicable content owner and may be protected by applicable law. This
license gives you no rights to such content.

*** Scope of grant

You may:
-   Use the software on one or more computers.
-   Customize the software's design to suit your own needs.

You may not:
-   Modify and/or remove the copyright notice in the the header of this source file.
-   Reverse engineer, disassemble, or create derivative works based on this script
    for distribution or usage outside your website.
-   Distribute this script without written consent from Sonicode.
-   Permit other individuals to use this script except under the terms listed above.

*** Third party modifications

Technical support will not be provided for third-party modifications to the
software including modifications to code to any license holder.

*** Disclaimer of warranty

The UPS XML Shipping Tool PHP Function Library is provided on an "as is" basis,
without warranty of any kind, including without limitation the warranties of
merchantability, fitness for a particular purpose and non-infringement. The
entire risk as to the quality and performance of this software is borne by you.

*/


/* UPS user information.  These values will be persisitant in your web application */
    $CFG->ups_userid            = "golfcarsetc";            // Enter your UPS User ID
    $CFG->ups_password          = "gce1739";                // Enter your UPS Password
    $CFG->ups_xml_access_key    = "DC739BFBA853AD80";       // Enter your UPS Access Key
    $CFG->ups_shipper_number    = "143W54";                 // Enter your UPS Shipper Number
    $CFG->ups_testmode          = "TRUE";                   // "TRUE" for test transactions "FALSE" for live transactions
    $CFG->companyname           = "SafariStuff";       // Your Company Name
    $CFG->companystreetaddress1 = "some address";    // Your Street Addres
    $CFG->companystreetaddress2 = "";                       // Your Street Address
    $CFG->companycity           = "some city";                // Your City
    $CFG->companystate          = "WA";                     // Your State
    $CFG->companyzipcode        = "99207";                  // Your Zipcode
    $CFG->companycountry        = "US";                     // Your Country Code

/*
    You will most likely want to load this data from a database, or receive the data from
    a html form.  For details on each of the field requirements, please refer to the UPS
    API Documentation.
*/

    $ship_to = array();
    $ship_to["company_name"]                    = "Valued Customer";           // Ship To Company
    $ship_to["attn_name"]                       = $ups_name;                // Ship To Name
    $ship_to["phone_dial_plan_number"]          = $ups_phone1;                 // Ship To First 6 Of Phone Number
    $ship_to["phone_line_number"]               = $ups_phone2;                   // Ship To Last 4 Of Phone Number
    $ship_to["phone_extension"]                 = "";                    // Ship To Phone Extension
    $ship_to["address_1"]                       = $ups_address;       // Ship To 1st Address Line
    $ship_to["address_2"]                       = $ups_address2;                       // Ship To 2nd Address Line
    $ship_to["address_3"]                       = "";                       // Ship To 3rd Address Line
    $ship_to["city"]                            = $ups_city;                 // Ship To City
    $ship_to["state_province_code"]             = $ups_state;                     // Ship To State
    $ship_to["postal_code"]                     = $ups_zip;                  // Ship To Postal Code
    $ship_to["country_code"]                    = "US";                 // Ship To Country Code

    $ship_from["company_name"]                  = "SafariStuff";       // Ship From Company
    $ship_from["attn_name"]                     = "";                       // Ship From Name
    $ship_from["phone_dial_plan_number"]        = "866926";                 // Ship From First 6 Of Phone Number
    $ship_from["phone_line_number"]             = "2360";                   // Ship From Last 4 Of Phone Number
    $ship_from["phone_extension"]               = "";                       // Ship From Phone Extension
    $ship_from["address_1"]                     = "some address";    // Ship From 1st Address Line
    $ship_from["address_2"]                     = "";                       // Ship From 2nd Address Line
    $ship_from["address_3"]                     = "";                       // Ship From 3rd Address Line
    $ship_from["city"]                          = "some city";                // Ship From City
    $ship_from["state_province_code"]           = "WA";                     // Ship From State
    $ship_from["postal_code"]                   = "99207";                  // Ship From Postal Code
    $ship_from["country_code"]                  = "US";                     // Ship From Country Code

    $shipment["bill_shipper_account_number"]    = $CFG->ups_shipper_number; // This will bill the shipper
    $shipment["service_code"]                   = $ups_service;                     // 01 Next Day
                                                                            // 02 2nd Day
                                                                            // 12 3rd Day
                                                                            // 03 Ground
    $shipment["packaging_type"]                 = "02";                     // 02 For "Your Packaging"
    $shipment["invoice_number"]                 = $ups_invoice;                  // Invoice Number
    $shipment["weight"]                         = $package_weight;                      // Total Weight Of Package (Not Less Than 1lb.)
    $shipment["insured_value"]                  = $package_value;                 // Insured Value Of Package
    $shipment["length"]                         = $package_length;                     // Package Length
    $shipment["width"]                          = $package_width;                     // Package Width
    $shipment["height"]                         = $package_height;                     // Package Height
    
// Include the required functions supplied by the UPS XML Shipping Tool PHP Function Library
include("admin/xmlship.php");

// Post the XML query for UPS ship confirm
$result = ups_ship_confirm($ship_to, $ship_from, $shipment);
    
if ($result["response_status_code"] == 1) {
    // The result was successful
     //$_SESSION['flash'][] == "SHIP CONFIRM";
     //print "Transportation Charges: ".number_format($result["transportation_charges"],2)."<br>";
     //print "Service Option Charges: ".number_format($result["service_options_charges"],2)."<br>";
     //print "Package Length: ".$result["package_length"]."<br>";
     //print "Package Width: ".$result["package_width"]."<br>";
     //print "Package Height: ".$result["package_height"]."<br>";
     //print "Total Charges: ".number_format($result["total_charges"],2)."<br>";
     //print "Billing Weight: ".$result["billing_weight"]."<br>";
     //print "Tracking Number: ".$result["tracking_number"]."<br>";
     //print "Insured Value: ".number_format($result["insured_value"],2)."<br>";
     // print "Shipment Digest: ".$result["shipment_digest"]."<br>";

    $ship_accept = ups_ship_accept($result['shipment_digest']);

    if ($ship_accept["response_status_code"] == 1) {
        //print "SHIP ACCEPT <br>";
        //print "Tracking Number: ".$ship_accept["tracking_number"]."<br>";
        //print "Label Image Format: ".$ship_accept["label_image_format"]."<br>";
        $tracking_number = $ship_accept["tracking_number"];
    
        $filename = 'ups_labels/' . $ups_invoice . '.gif';
        $graphic_image = base64_decode($ship_accept["graphic_image"]);

            if (!$handle = fopen($filename, 'w')) {
                 $error =  "Cannot open file ($filename)";
                 exit;
            }

            // Write graphic image data to our opened file.
            if (fwrite($handle, $graphic_image) === FALSE) {
                $error =  "Cannot write to file ($filename)";
                exit;
            }

            //echo "Success, wrote grapic image data to file ($filename)<br>";

            fclose($handle);

    }

} else {
    // There was an error

    $error = $result["error_description"];

}

/*
NOTES:

Once the Ship Confirm request is successful, you will want to move on to the
Ship Accept transaction.  You will only need to pass the
$result["shipment_digest"] value to the ups_ship_accept function for UPS
to finalize the shipment as "billable" and return the shipping label.  The
shipping label data is base64 encoded for transport from UPS's XML servers.
You will need to simply base64 decode the result data and output the data
to be spooled to the printer.  Thermal label support exists, as well as GIF
labels to be printed on laser printers.  Please consult your UPS Ship Tools
API documentation for more details on shipping options.
*/

$cart_id = $ups_invoice;
if ( isset($error) ) {
  $_SESSION['flash'][] = $error;
} else {
  $_SESSION['flash'][] = "Label Generated for Tracking Number: $tracking_number" ;
}

$db->query("UPDATE cart SET tracking_number='$tracking_number' WHERE id='$ups_invoice'");

header("Location: admin.php?action=order_details&cart_id=$ups_invoice");
?>
