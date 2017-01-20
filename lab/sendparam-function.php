<?php
$array_demo = array('1','2','3');

echo demo($array_demo);


function demo($values){

//    var_dump($values);

    foreach($values as $result){
        echo $result;
    }
}