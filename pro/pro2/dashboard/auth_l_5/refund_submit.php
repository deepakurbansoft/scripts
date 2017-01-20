<?php

require 'db_conn.php';
page_protect();

error_reporting(0);
$id = $_POST['Id'];
$date = $_POST['date'];
$refund_amount = $_POST['refund_amount'];
$reason = $_POST['reason'];

mysqli_query($con, "UPDATE user_data SET wait='cancel' WHERE newid='$id'");
mysqli_query($con, "UPDATE subsciption SET date_of_cancel='$date',reason_for_cancel='$reason',refund_amount='$refund_amount' WHERE mem_id='$id'");


$form_data['success'] = true;
$form_data['user_id'] = $id;

echo json_encode($form_data);

