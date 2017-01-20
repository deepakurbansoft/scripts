<?php

require 'db_conn.php';
page_protect();

error_reporting(0);
$id = $_POST['activate_userid'];

$query1  = "select * from subsciption WHERE mem_id='$id' ";
$result1 = mysqli_query($con, $query1);
if (mysqli_affected_rows($con) == 1) {
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

        $balance_days = $row1['balance_days'];

    }
}

$day_count = $balance_days;


$date = strtotime($day_count." day", time());

 $result_date =  date('Y/m/d', $date);



mysqli_query($con, "UPDATE user_data SET wait='no' WHERE newid='$id'");

mysqli_query($con, "UPDATE subsciption SET expiry='$result_date' WHERE mem_id='$id'");


$form_data['success'] = true;
$form_data['user_id'] = $id;

echo json_encode($form_data);

