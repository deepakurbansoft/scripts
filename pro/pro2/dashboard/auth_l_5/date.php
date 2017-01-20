<?php


$day_count = $_POST['day_count'];


$date = strtotime($day_count." day", time());

$result_date =  date('m/d/Y', $date);

$form_data['success'] = true;

$form_data['result_date'] = $result_date;


echo json_encode($form_data);

