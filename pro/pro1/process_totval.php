<?php

include("db.php");

extract($_POST);

if($type==2){
    $res_totalvalue =  $total_value;
    $res_totalprice =  number_format($total_amount+25.00,2);
}elseif($type==3){

    $res_totalvalue =  $total_value;
    $res_totalprice =  number_format($total_amount-25.00,2);
}else{

    $get_tot= "SELECT * FROM `list` WHERE `id` = '$id'";

    $tot_query = mysql_query($get_tot);


        $fetch_tot = mysql_fetch_assoc($tot_query);
        if($type==1){
            if($count==0){
                $total_amount=$total_amount;
            }
            $res_totalvalue =  number_format($total_value+$fetch_tot['dollar_value'],2);
            $res_totalprice =  number_format($total_amount+$fetch_tot['coupon_price'],2);
        }else{
            if($count==1){
                $total_amount=$total_amount;
            }
            $res_totalvalue =  number_format($total_value-$fetch_tot['dollar_value'],2);
            $res_totalprice =  number_format($total_amount-$fetch_tot['coupon_price'],2);
        }

}

    $form_data['success'] = true;
    $form_data['res_totalvalue'] = $res_totalvalue;
    $form_data['res_totalprice'] = $res_totalprice;
    $form_data['id'] = $id;



echo json_encode($form_data);