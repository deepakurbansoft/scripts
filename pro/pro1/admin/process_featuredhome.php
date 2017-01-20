<?php

include("db.php");

extract($_POST);

$get_tot= "SELECT * FROM `list` WHERE `id` = '$id'";

$tot_query = mysql_query($get_tot);

if(mysql_num_rows($tot_query)>0){


    mysql_query("UPDATE `list` SET `featured_home` = 0 WHERE 1");


    mysql_query("UPDATE `list` SET `featured_home` = '$status' WHERE `id` = '$id'");


    $form_data['success'] = true;

}
else{

    $form_data['success'] = false;
}

echo json_encode($form_data);