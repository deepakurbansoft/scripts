<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30-11-2016
 * Time: PM 07:25
 */
$unameid = 69;
$ch1 = curl_init();// init curl
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
curl_setopt($ch1, CURLOPT_POST, 1);// set post data to true
curl_setopt($ch1, CURLOPT_POSTFIELDS,"id=$unameid");// post data

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

$response_pro = curl_exec ($ch1);// response it ouputed in the response var

curl_close ($ch1);// close curl connection

$obj_prop = json_decode($response_pro);
//var_dump($obj_prop);

foreach($obj_prop as $res){

    var_dump($res->features);


}