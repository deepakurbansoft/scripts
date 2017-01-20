<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30-11-2016
 * Time: PM 07:25
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'http://ifm.urbansoft-googleglass.com/WebService/Category');
$result = curl_exec($ch);
curl_close($ch);
$obj = json_decode($result);
//print '<pre>';
//print_r($obj->datas2);
//$ser = $obj->datas1;
//$aser1 = $obj->datas2;
//die();

foreach($obj->datas2 as $data){

    echo $data->cat_name;
//    var_dump($data[0]);
//    foreach($data as $result) {
//
//        if($result->grop_id==2){
//                    echo $result->cat_name;
//        }
//
//
//
//    }
}

