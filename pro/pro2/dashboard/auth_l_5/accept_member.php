<?php

require 'db_conn.php';

$mem_id = $_POST['mem_id'];

mysqli_query($con, "UPDATE user_data SET wait='no' WHERE newid='$mem_id'");


$query  = "select * from subsciption_temp where mem_id = '$mem_id'";

$result = mysqli_query($con, $query);

if (mysqli_affected_rows($con) != 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $name = $row['name'];
        $sub_type = $row['sub_type'];
        $paid_date = $row['paid_date'];
        $expiry = $row['expiry'];
        $total = $row['total'];
        $discount = $row['discount'];
        $paid = $row['paid'];
        $invoice = $row['invoice'];
        $sub_type_name = $row['sub_type_name'];
        $bal = $row['bal'];
        $exp_time = $row['exp_time'];
        $renewal = $row['renewal'];

    }
}

mysqli_query($con, "INSERT INTO subsciption (mem_id,name,sub_type,paid_date,total,discount,paid,expiry,invoice,sub_type_name,bal,exp_time,renewal) VALUES ('$mem_id','$name','$sub_type','$paid_date','$total','$discount','$paid','$expiry','$invoice','$sub_type_name','$bal','$exp_time','$renewal')");
mysqli_query($con, "DELETE FROM subsciption_temp WHERE mem_id = '$mem_id'");



$query  = "select * from subsciption_temp_sub where mem_id = '$mem_id'";

$result = mysqli_query($con, $query);

if (mysqli_affected_rows($con) != 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $id = $row['id'];
        $mem_id = $row['mem_id'];
        $plan_id = $row['plan_id'];
        $paid_date = $row['paid_date'];
        $expire_date = $row['expire_date'];
        $invoice = $row['invoice'];

        mysqli_query($con, "INSERT INTO subsciption_sub (mem_id,plan_id,expire_date,invoice) VALUES ('$mem_id','$plan_id','$expire_date','$invoice')");
        mysqli_query($con, "DELETE FROM subsciption_temp_sub WHERE id = '$id'");

    }
}








$form_data['success'] = true;

$form_data['mem_id'] = $mem_id;


echo json_encode($form_data);

?>