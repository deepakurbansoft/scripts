<?php

require 'db_conn.php';
page_protect();

error_reporting(0);
$id = $_POST['Id'];

$query1  = "select * from subsciption WHERE mem_id='$id' ";
$result1 = mysqli_query($con, $query1);
if (mysqli_affected_rows($con) == 1) {
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

          $plan = $row1['sub_type_name'];
          $date = $row1['paid_date'];
          $paid_amount = $row1['paid'];

        }
    }

$query2  = "select * from mem_types WHERE name='$plan' ";
$result2 = mysqli_query($con, $query2);
if (mysqli_affected_rows($con) == 1) {
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

          $price_perday = $row2['days']/$row2['rate'];


        }
    }

$amount = round($price_perday,2);


$date1=date_create($date);
$current_date = date("Y-m-d");

$date1=date_create($date);
$date2=date_create($current_date);
$diff=date_diff($date1,$date2);
$day_count = $diff->format("%a");

$refund_amount = $paid_amount-($amount*$day_count);

$form_data['success'] = true;

$form_data['refund_amount'] = $refund_amount;

echo json_encode($form_data);

