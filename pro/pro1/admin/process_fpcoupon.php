<?php

include("db.php");

extract($_POST);

$get_tot= "SELECT * FROM `list` WHERE `id` = '$id'";

$tot_query = mysql_query($get_tot);

if(mysql_num_rows($tot_query)>0){

    $get_fpcoupncount = mysql_query("SELECT * FROM `list` WHERE `firstpage_coupon` = 1");

    if($status == 1){
        if(mysql_num_rows($get_fpcoupncount)<25){

            mysql_query("UPDATE `list` SET `firstpage_coupon` = '$status' WHERE `id` = '$id'");
            $form_data['success'] = true;

        }else{

            $form_data['success'] = false;
            $form_data['msg'] = 'Only 25 Coupons are allowed. Turn Off Coupons.';
        }
    }else{

        mysql_query("UPDATE `list` SET `firstpage_coupon` = '$status' WHERE `id` = '$id'");
        $form_data['success'] = true;
    }


}
else{

    $form_data['success'] = false;
}

echo json_encode($form_data);