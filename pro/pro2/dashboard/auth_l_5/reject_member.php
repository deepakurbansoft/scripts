<?php

require 'db_conn.php';

$mem_id = $_POST['mem_id'];

mysqli_query($con, "UPDATE user_data SET wait='rejected' WHERE newid='$mem_id'");


$form_data['success'] = false;

$form_data['mem_id'] = $mem_id;


echo json_encode($form_data);

?>