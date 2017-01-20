<?php
require 'db_conn.php';
page_protect();

if (isset($_POST['p_id'])) {


    $memid    = $_POST['p_id'];
    $mem_type = $_POST['mem_type'];

    $pre_expdate = get_field('subsciption',$memid,'mem_id','expiry');

    $query1 = "select * from mem_types WHERE mem_type_id='$mem_type'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name_type = $row1['name'];
            $details   = $row1['details'];
            $days      = $row1['days'];
            
            
        }
    }
    $query2 = "select * from user_data WHERE newid='$memid'";
    
    //echo $query;
    $result2 = mysqli_query($con, $query2);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            
            $full_name = $row2['name'];
            $age       = $row2['age'];
            $sex       = $row2['sex'];
            $height    = $row2['height'];
            $weight    = $row2['weight'];
            
            
        }
    }


    $invoice_query = "SELECT * FROM `user_data` ORDER BY `invoice` DESC LIMIT 1";

    $get_invoice = mysqli_query($con, $invoice_query);

    if (mysqli_affected_rows($con) == 1) {
        while ($row_invoice = mysqli_fetch_array($get_invoice, MYSQLI_ASSOC)) {

            $last_invoice = $row_invoice['invoice'];
        }
    }
    else{
        $last_invoice = '5000';
    }

//    $get_invoice_letter = get_field('gym_location',$location ,'id','invoice_letter');
    $invoice = $last_invoice+1;

//    $invoice   = substr(time(), 2, 10) . getRandomWord();

    $date      = $_POST['date'];
    $full_name = rtrim($_POST['p_name']);
    $total     = $_POST['total'];
    $paid      = $_POST['paid'];
    $mod_date  = strtotime($pre_expdate . "+ $days days");
    $expiry    = date("Y-m-d", $mod_date);
    $wait      = "no";
    $time      = $days * 86400;
    $exp_time  = $time + strtotime($date);
    $bal       = $total - $paid;
    $discount      = $_POST['discount'];

    mysqli_query($con, "UPDATE subsciption SET renewal='no' WHERE renewal='yes' AND mem_id='$memid'");

    mysqli_query($con, "UPDATE subsciption_sub SET renewal='no' WHERE renewal='yes' AND mem_id='$memid'");

    mysqli_query($con, "INSERT INTO subsciption (mem_id,name,sub_type,paid_date,total,paid,expiry,invoice,sub_type_name,bal,exp_time,renewal) VALUES ('$memid','$full_name','$mem_type','$date','$total','$paid','$expiry','$invoice','$name_type','$bal','$exp_time','yes')");

    $sub_plan = $_POST['sub_plan'];

    if(isset($_POST['sub_plan'])){
        foreach($sub_plan as $sub_details){

            $subplan_query = "select * from mem_types_sub WHERE mem_type_id='$sub_details'";

            //echo $query;
            $result_subplan = mysqli_query($con, $subplan_query);

            if (mysqli_affected_rows($con) == 1) {

                while ($row_subplan = mysqli_fetch_array($result_subplan, MYSQLI_ASSOC)) {

                    $subplan_daycount = $row_subplan['days'];

                    $date = strtotime($subplan_daycount." day", time());

                    $result_date =  date('Y/m/d', $date);



                }
            }

            mysqli_query($con, "INSERT INTO subsciption_sub (mem_id,plan_id,expire_date,invoice,renewal) VALUES ('$memid','$sub_details','$result_date','$invoice','yes')");


        }
    }

    echo "<head><script>alert('Payment Added ,');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
    
    
    
} else {
    echo "<head><script>alert('Payment NOT Added, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
    
}
?>

