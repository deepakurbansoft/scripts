<?php

require 'db_conn.php';
page_protect();

error_reporting(0);

if (isset($_POST['mem_id'])) {

    $photo = 'profile_pic/no_profile.gif';
    mysqli_query($con, "UPDATE user_data SET pic_add = '$name' WHERE newid = '$photo'");

    $form_data['success'] = true;

    $form_data['refund_amount'] = $refund_amount;

} else {

    $form_data['success'] = true;

    $form_data['refund_amount'] = $refund_amount;

}



echo json_encode($form_data);

