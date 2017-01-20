<?php
  include('define_string.php');
  //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
  //if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or live
	define('PPL_MODE', 'sandbox');

	if(PPL_MODE=='sandbox'){

		define('PPL_API_USER', 'deepak-facilitator_api1.urbansoft.in');
		define('PPL_API_PASSWORD', 'A7SPSYBWK3D7QL5W');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AJdv.oP5o2vadVhu3fyAPAVUXE16');
	}
	else{
		
		define('PPL_API_USER', 'deepak-facilitator_api1.urbansoft.in');
		define('PPL_API_PASSWORD', 'A7SPSYBWK3D7QL5W');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AJdv.oP5o2vadVhu3fyAPAVUXE16');
	}
	
	define('PPL_LANG', 'EN');
	
	define('PPL_LOGO_IMG', site_url.'/img/cbpc_logo.jpg');
	
	define('PPL_RETURN_URL', site_url.'/order_success.php');
	define('PPL_CANCEL_URL', site_url.'/cancel_order.php');

//	define('PPL_RETURN_URL', 'http://localhost/cashbookpickandclick.com/order_success.php');
//	define('PPL_CANCEL_URL', 'http://localhost/cashbookpickandclick.com/cancel_order.php');

	define('PPL_CURRENCY_CODE', 'USD');


//if(PPL_MODE=='sandbox'){
//
//	define('PPL_API_USER', 'toddaelkins-facilitator_api1.bellsouth.net');
//	define('PPL_API_PASSWORD', 'FCX2FLL9AZ2W2GRS');
//	define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AIFummSx4GYDx0K6O5yKWW1t5J9m');
//}
//else{
//
//	define('PPL_API_USER', 'deepak-facilitator_api1.urbansoft.in');
//	define('PPL_API_PASSWORD', 'A7SPSYBWK3D7QL5W');
//	define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AJdv.oP5o2vadVhu3fyAPAVUXE16');
//}