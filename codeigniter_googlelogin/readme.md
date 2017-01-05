
# Codeigniter Google Login Library 


Integrates Google login with codeigniter 

# Installation

Sample code is provided in demo folder.

Copy the content from library and config folder to your respective codeigniter application folder.

Add your client ID,client secret,and callback url in `config/google_config.php`

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['google_client_id']="XXXX";
$config['google_client_secret']="XXXX";
$config['google_redirect_url']=base_url().'auth/oauth2callback';

```


# License


Please see the [license
agreement](https://github.com/shivraj-chari/codeigniter-google-login-library/blob/master/license.txt).

# Resources


-  User Guide [Codeigniter](http://www.codeigniter.com/docs).
-  Google Client library [Resource](https://github.com/google/google-api-php-client).

# Demo

[Here](http://shivrajchari.com/demo/verify/google).