<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '1003123646407924'; //Facebook App ID
$appSecret = '9f40a5cbafaa8f4e2979d93ec3171914'; // Facebook App Secret
$homeurl = 'http://www.cdeepak.com/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>