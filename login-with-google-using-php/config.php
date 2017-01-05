<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '497865222618-comlmncbqa7ehg54uvffdpjthng30ccr.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '-RSn7nIEHCAAGoY4lf1mmBzC'; //Google CLIENT SECRET
$redirectUrl = 'http://www.cdeepak.com/';  //return url (url to script)
$homeUrl = 'http://www.cdeepak.com/account.php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Google Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>