<?php 
class Configuration
{
	// For a full list of configuration parameters refer in wiki page (https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK)
	public static function getConfig()
	{
		$config = array(
				// values: 'sandbox' for testing
				//		   'live' for production
                //         'tls' for testing if your server supports TLSv1.2
				"mode" => "live",
                // TLSv1.2 Check: Comment the above line, and switch the mode to tls as shown below
                // "mode" => "tls"

                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'FINE'
	
				// These values are defaulted in SDK. If you want to override default values, uncomment it and add your value.
				// "http.ConnectionTimeOut" => "5000",
				// "http.Retry" => "2",
		);
		return $config;
	}
	
	// Creates a configuration array containing credentials and other required configuration parameters.
	public static function getAcctAndConfig()
	{
		$config = array(
				// Signature Credential
//				"acct1.UserName" => "deepak-facilitator_api1.urbansoft.in",
//				"acct1.Password" => "A7SPSYBWK3D7QL5W",
//				"acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31AJdv.oP5o2vadVhu3fyAPAVUXE16",
				"acct1.UserName" => "toddaelkins_api1.bellsouth.net",
				"acct1.Password" => "25ZF8VF4DKL9LPCL",
				"acct1.Signature" => "A8XX6u8tUY.-Sptq-rKbqqGSeWFBAS1AmmUIjWEfBjWIzeq6iPLbVEdy",

				// Subject is optional and is required only in case of third party authorization
				// "acct1.Subject" => "",
				
				// Sample Certificate Credential
				// "acct1.UserName" => "certuser_biz_api1.paypal.com",
				// "acct1.Password" => "D6JNKKULHN3G5B8A",
				// Certificate path relative to config folder or absolute path in file system
				// "acct1.CertPath" => "cert_key.pem",
				// Subject is optional and is required only in case of third party authorization
				// "acct1.Subject" => "",
		
				);
		
		return array_merge($config, self::getConfig());
	}

}
