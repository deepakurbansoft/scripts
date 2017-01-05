<?php

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
	
	define('PPL_LOGO_IMG', 'http://urbansoft.co/wp-content/uploads/2015/10/LOGO.png');
	
	define('PPL_RETURN_URL', 'http://localhost/paypal/process.php');
	define('PPL_CANCEL_URL', 'http://localhost/paypal/cancel_url.php');

	define('PPL_CURRENCY_CODE', 'EUR');
