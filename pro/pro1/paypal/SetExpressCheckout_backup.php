<?php include('../define_string.php'); ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>CBPC | Coupons</title>

		<!-- Bootstrap Core CSS -->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<link href="../css/style.css" rel="stylesheet">

		<link href="../bower_components/build.css" rel="stylesheet">

		<link href="../vendor/pagination/styles.css" rel="stylesheet">
		<link href="../vendor/checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


		<!-- Custom Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

		<!-- jQuery -->
		<script src="../vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>

		<script src="../js/custom.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">

			.invoice-title h2, .invoice-title h3 {
				display: inline-block;
			}

			.table > tbody > tr > .no-line {
				border-top: none;
			}

			.table > thead > tr > .no-line {
				border-bottom: none;
			}

			.table > tbody > tr > .thick-line {
				border-top: 2px solid;
			}

		</style>
	</head>

	<body>

	<!-- Wrap all page content here -->
	<div id="wrap">

		<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top cbpc_bg">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="../img/cbpc_logo.jpg" width="300">
<!--					<a class="navbar-brand" href="#">cashbookpickandclick.com</a>-->
				</div>

				<div class="collapse navbar-collapse pull-right">
					<ul class="nav navbar-nav">

						<li><a href="<?php echo site_url ?>">Home</a></li>
						<li><a href="#">About</a></li>
						<li class="active"><a href="#">Coupons</a></li>
						<li><a href="#">Contact Us</a></li>


					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>


		<div class="container">
			<div class="row">

				<div class="col-xs-4">

				</div>
				<div class="col-xs-4">
					<div class="invoice-title" style="margin-top: 100px; text-align: center; border: 1px solid #01657B;">

						<?php
						include("../db.php");


						use PayPal\CoreComponentTypes\BasicAmountType;
						use PayPal\EBLBaseComponents\AddressType;
						use PayPal\EBLBaseComponents\BillingAgreementDetailsType;
						use PayPal\EBLBaseComponents\PaymentDetailsItemType;
						use PayPal\EBLBaseComponents\PaymentDetailsType;
						use PayPal\EBLBaseComponents\SetExpressCheckoutRequestDetailsType;
						use PayPal\PayPalAPI\SetExpressCheckoutReq;
						use PayPal\PayPalAPI\SetExpressCheckoutRequestType;
						use PayPal\Service\PayPalAPIInterfaceServiceService;
						require_once('PPBootStrap.php');
						extract($_POST);
						/*
                         * The SetExpressCheckout API operation initiates an Express Checkout transaction
                         * This sample code uses Merchant PHP SDK to make API call
                         */
						$url = dirname('http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']);
						$returnUrl = "$url/GetExpressCheckout.php";
						$cancelUrl = "$url/SetExpressCheckout.php" ;

						$currencyCode = $_REQUEST['currencyCode'];
						// total shipping amount
						$shippingTotal = new BasicAmountType($currencyCode, $_REQUEST['shippingTotal']);
						//total handling amount if any
						$handlingTotal = new BasicAmountType($currencyCode, $_REQUEST['handlingTotal']);
						//total insurance amount if any
						$insuranceTotal = new BasicAmountType($currencyCode, $_REQUEST['insuranceTotal']);

						// shipping address
						$address = new AddressType();
						$address->CityName = $_REQUEST['city'];
						$address->Name = $_REQUEST['name'];
						$address->Street1 = $_REQUEST['street'];
						$address->StateOrProvince = $_REQUEST['state'];
						$address->PostalCode = $_REQUEST['postalCode'];
						$address->Country = $_REQUEST['countryCode'];
						$address->Phone = $_REQUEST['phone'];

						// details about payment
						$paymentDetails = new PaymentDetailsType();
						$itemTotalValue = 0;
						$taxTotalValue = 0;
						/*
                         * iterate trhough each item and add to atem detaisl
                         */
						for($i=0; $i<count($_REQUEST['itemAmount']); $i++) {
							$itemAmount = new BasicAmountType($currencyCode, $_REQUEST['itemAmount'][$i]);
							$itemTotalValue += $_REQUEST['itemAmount'][$i] * $_REQUEST['itemQuantity'][$i];
							$taxTotalValue += $_REQUEST['itemSalesTax'][$i] * $_REQUEST['itemQuantity'][$i];
							$itemDetails = new PaymentDetailsItemType();
							$itemDetails->Name = $_REQUEST['itemName'][$i];
							$itemDetails->Amount = $itemAmount;
							$itemDetails->Quantity = $_REQUEST['itemQuantity'][$i];
							/*
                             * Indicates whether an item is digital or physical. For digital goods, this field is required and must be set to Digital. It is one of the following values:

                            Digital

                            Physical

                             */
							$itemDetails->ItemCategory = $_REQUEST['itemCategory'][$i];
							$itemDetails->Tax = new BasicAmountType($currencyCode, $_REQUEST['itemSalesTax'][$i]);

							$paymentDetails->PaymentDetailsItem[$i] = $itemDetails;
						}

						/*
                         * The total cost of the transaction to the buyer. If shipping cost and tax charges are known, include them in this value. If not, this value should be the current subtotal of the order. If the transaction includes one or more one-time purchases, this field must be equal to the sum of the purchases. If the transaction does not include a one-time purchase such as when you set up a billing agreement for a recurring payment, set this field to 0.
                         */
						$orderTotalValue = $shippingTotal->value + $handlingTotal->value +
								$insuranceTotal->value +
								$itemTotalValue + $taxTotalValue;

						//Payment details
						$paymentDetails->ShipToAddress = $address;
						$paymentDetails->ItemTotal = new BasicAmountType($currencyCode, $itemTotalValue);
						$paymentDetails->TaxTotal = new BasicAmountType($currencyCode, $taxTotalValue);
						$paymentDetails->OrderTotal = new BasicAmountType($currencyCode, $orderTotalValue);

						/*
                         * How you want to obtain payment. When implementing parallel payments, this field is required and must be set to Order. When implementing digital goods, this field is required and must be set to Sale. If the transaction does not include a one-time purchase, this field is ignored. It is one of the following values:

                            Sale � This is a final sale for which you are requesting payment (default).

                            Authorization � This payment is a basic authorization subject to settlement with PayPal Authorization and Capture.

                            Order � This payment is an order authorization subject to settlement with PayPal Authorization and Capture.

                         */
						$paymentDetails->PaymentAction = $_REQUEST['paymentType'];

						$paymentDetails->HandlingTotal = $handlingTotal;
						$paymentDetails->InsuranceTotal = $insuranceTotal;
						$paymentDetails->ShippingTotal = $shippingTotal;

						/*
                         *  Your URL for receiving Instant Payment Notification (IPN) about this transaction. If you do not specify this value in the request, the notification URL from your Merchant Profile is used, if one exists.
                         */
						if(isset($_REQUEST['notifyURL']))
						{
							$paymentDetails->NotifyURL = $_REQUEST['notifyURL'];
						}

						$setECReqDetails = new SetExpressCheckoutRequestDetailsType();
						$setECReqDetails->PaymentDetails[0] = $paymentDetails;
						/*
                         * (Required) URL to which the buyer is returned if the buyer does not approve the use of PayPal to pay you. For digital goods, you must add JavaScript to this page to close the in-context experience.
                         */
						$setECReqDetails->CancelURL = $cancelUrl;
						/*
                         * (Required) URL to which the buyer's browser is returned after choosing to pay with PayPal. For digital goods, you must add JavaScript to this page to close the in-context experience.
                         */
						$setECReqDetails->ReturnURL = $returnUrl;


						$get_invoice = mysql_query("SELECT `invoice` FROM `orders` ORDER BY `orders`.`invoice` DESC LIMIT 1  ");


						if(mysql_num_rows($get_invoice)){

							$fetch_invoice = mysql_fetch_array($get_invoice);
							  $invoice_id = $fetch_invoice['invoice']+1;

						}else{
							  $invoice_id = 1;
						}



						$setECReqDetails->InvoiceID = $invoice_id;

						/*
                         * Determines where or not PayPal displays shipping address fields on the PayPal pages. For digital goods, this field is required, and you must set it to 1. It is one of the following values:

                            0 � PayPal displays the shipping address on the PayPal pages.

                            1 � PayPal does not display shipping address fields whatsoever.

                            2 � If you do not pass the shipping address, PayPal obtains it from the buyer's account profile.

                         */
						$setECReqDetails->NoShipping = $_REQUEST['noShipping'];
						/*
                         *  (Optional) Determines whether or not the PayPal pages should display the shipping address set by you in this SetExpressCheckout request, not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. It is one of the following values:

                            0 � The PayPal pages should not display the shipping address.

                            1 � The PayPal pages should display the shipping address.

                         */
						$setECReqDetails->AddressOverride = $_REQUEST['addressOverride'];

						/*
                         * Indicates whether or not you require the buyer's shipping address on file with PayPal be a confirmed address. For digital goods, this field is required, and you must set it to 0. It is one of the following values:

                            0 � You do not require the buyer's shipping address be a confirmed address.

                            1 � You require the buyer's shipping address be a confirmed address.

                         */
						$setECReqDetails->ReqConfirmShipping = $_REQUEST['reqConfirmShipping'];

						// Billing agreement details
						$billingAgreementDetails = new BillingAgreementDetailsType($_REQUEST['billingType']);
						$billingAgreementDetails->BillingAgreementDescription = $_REQUEST['billingAgreementText'];
						$setECReqDetails->BillingAgreementDetails = array($billingAgreementDetails);

						// Display options
						$setECReqDetails->cppheaderimage = $_REQUEST['cppheaderimage'];
						$setECReqDetails->cppheaderbordercolor = $_REQUEST['cppheaderbordercolor'];
						$setECReqDetails->cppheaderbackcolor = $_REQUEST['cppheaderbackcolor'];
						$setECReqDetails->cpppayflowcolor = $_REQUEST['cpppayflowcolor'];
						$setECReqDetails->cppcartbordercolor = $_REQUEST['cppcartbordercolor'];
						$setECReqDetails->cpplogoimage = $_REQUEST['cpplogoimage'];
						$setECReqDetails->PageStyle = $_REQUEST['pageStyle'];
						$setECReqDetails->BrandName = $_REQUEST['brandName'];

						// Advanced options
						$setECReqDetails->AllowNote = $_REQUEST['allowNote'];

						$setECReqType = new SetExpressCheckoutRequestType();
						$setECReqType->SetExpressCheckoutRequestDetails = $setECReqDetails;
						$setECReq = new SetExpressCheckoutReq();
						$setECReq->SetExpressCheckoutRequest = $setECReqType;

						/*
                         * 	 ## Creating service wrapper object
                        Creating service wrapper object to make API call and loading
                        Configuration::getAcctAndConfig() returns array that contains credential and config parameters
                        */
						$paypalService = new PayPalAPIInterfaceServiceService(Configuration::getAcctAndConfig());
						try {
							/* wrap API method calls on the service object with a try catch */
							$setECResponse = $paypalService->SetExpressCheckout($setECReq);
						} catch (Exception $ex) {
							include_once("../Error.php");
							exit;
						}
						if(isset($setECResponse)) {
//	echo "<table>";
//	echo "<tr><td>Ack :</td><td><div id='Ack'>$setECResponse->Ack</div> </td></tr>";
//	echo "<tr><td>Token :</td><td><div id='Token'>$setECResponse->Token</div> </td></tr>";
//	echo "</table>";
//	echo '<pre>';
//	print_r($setECResponse);
//	echo '</pre>';
							if($setECResponse->Ack =='Success') {

								$token = $setECResponse->Token;

								$user_query = mysql_query("SELECT * FROM `users` WHERE `email` = '$buyerEmail'");

								if(mysql_num_rows($user_query)>0) {
									while ($row = mysql_fetch_array($user_query)) {
										$user_id = $row['id'];
									}
								}else{
									$insert_email = mysql_query("INSERT INTO `users` (`name`,`email`) VALUES (' ','$buyerEmail')");
//									echo "INSERT INTO `users` (`name`,``email`) VALUES (' ','$buyerEmail')";
									$user_id = mysql_insert_id();
								}


								$_SESSION['cbpc_user'] = $user_id;

								$orders = mysql_query("INSERT INTO `orders` (`user_id`,`token`,`invoice`,`status`) VALUES ('$user_id','$token','$invoice_id','0')");
//								echo "INSERT INTO `orders` (`user_id`,`token`,`invoice`,`status`) VALUES ('$user_id','$token','$invoice_id','0')";

									foreach($product_id as $product){
										$orders_query = mysql_query("INSERT INTO `order_details` (`invoice`,`product_id`) VALUES ('$invoice_id','$product')");


									}




								// Redirect to paypal.com here
//								$payPalURL = 'https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=' . $token;
								$payPalURL = 'https://www.paypal.com/webscr?cmd=_express-checkout&token=' . $token;

								?>
									<img src="../img/cbpc_logo.jpg" width="300">
								<div style="padding: 30px;"><span style="font-size: 40px; font-weight: bold;padding: 20px;">$ <?php echo number_format($orderTotalValue,2)?></span></div>

					<div><a href="<?php echo $payPalURL ?>"><img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/silver-rect-paypalcheckout-34px.png" alt="PayPal Checkout" style="border: 1px solid;"></a></div>
<br><br>
					<div ><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="Credit Card Badges" style="width: 80%;"></div><br>
								<?php
//		echo" <a href=$payPalURL><b>* Confirm to Checkout </b></a><br>";

							}
						}


						//echo "$payPalURL";

						//echo "<script> window.location='.$payPalURL.'; </script>";
						//require_once 'Response.php';
						?>









					</div>


				</div>

				<div class="col-xs-4">

				</div>


			</div>


		</div>


	</div>







	</body>

	</html>



