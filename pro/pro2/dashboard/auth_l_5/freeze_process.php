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

        }
    }

$query2  = "select * from mem_types WHERE name='$plan' ";
$result2 = mysqli_query($con, $query2);
if (mysqli_affected_rows($con) == 1) {
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

          $days= $row2['days'];


        }
    }

$query3  = "select * from user_data WHERE newid='$id' ";
$result3 = mysqli_query($con, $query3);
if (mysqli_affected_rows($con) == 1) {
    while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {

         $date= $row3['joining'];


        }
    }


$date1=date_create($date);
$current_date = date("Y-m-d");

$date1=date_create($date);
$date2=date_create($current_date);
$diff=date_diff($date1,$date2);
$day_count = $diff->format("%a");

$balance_days = $days-$day_count;

$form_data['success'] = true;
$form_data['plan'] = $plan;
$form_data['total_days'] = $days;
$form_data['served_days'] = $day_count;
$form_data['balance_days'] = $balance_days;

echo json_encode($form_data);

