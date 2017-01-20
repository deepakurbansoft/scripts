<?php

require 'db_conn.php';
page_protect();

error_reporting(0);
$id = $_POST['user_id'];
$balance_days = $_POST['balance_days'];

mysqli_query($con, "UPDATE user_data SET wait='freeze' WHERE newid='$id'");

$current_date = date("Y-m-d");

mysqli_query($con, "UPDATE subsciption SET freeze_date='$current_date',balance_days='$balance_days' WHERE mem_id=$id");


$form_data['success'] = true;

$form_data['user_id'] = $id;

echo json_encode($form_data);

