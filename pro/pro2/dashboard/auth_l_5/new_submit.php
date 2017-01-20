<?php
require 'db_conn.php';
page_protect();

$query2 = "select * from user_data WHERE wait='yes'";

//echo $query;
$result2 = mysqli_query($con, $query2);

//if (mysqli_affected_rows($con) == 1) {
//
//} else {
//    mysqli_query($con, "DELETE FROM user_data WHERE wait='yes'");
//
//    echo "<head><script>alert('Profile NOT Added, Check Again');</script></head></html>";
//    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
//}

if (isset($_POST['p_name']) && isset($_POST['mem_type']) && isset($_POST['total']) && isset($_POST['age']) && isset($_POST['paid'])) {

    function getRandomWord($len = 3)
    {
        $word = array_merge(range('a', 'z'), range('0', '9'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    $mem_type = $_POST['mem_type'];
    
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

    $location      = $_POST['location'];

        $gym_query = "select * from gym_location WHERE id='$location'";

    //echo $query;
    $result_gym = mysqli_query($con, $gym_query);

    if (mysqli_affected_rows($con) == 1) {
        while ($row_gym = mysqli_fetch_array($result_gym, MYSQLI_ASSOC)) {

            $location_name = $row_gym['name'];



        }
    }
    
    $proof = $_POST['proof'];

    if (isset($_POST['other_proof'])) {
        $other_proof = $_POST['other_proof'];
    } else {
        $other_proof = " ";
    }


//    $invoice   = substr(time(), 2, 10) . getRandomWord();

    $date      = $_POST['date'];
    $age       = rtrim($_POST['age']);
    $full_name = rtrim($_POST['p_name']);
    $email     = rtrim($_POST['email']);
    $address   = rtrim($_POST['add']);
    $contact   = rtrim($_POST['contact']);
    $sex       = rtrim($_POST['sex']);
    $height    = rtrim($_POST['height']);
    $weight    = rtrim($_POST['weight']);
    $total     = $_POST['total'];
    $paid      = $_POST['paid'];
    $discount      = $_POST['discount'];
    $emg_name      = $_POST['emg_name'];
    $emg_no      = $_POST['emg_no'];
    $mop      = $_POST['mop'];
    $card_no      = $_POST['card_no'];
    $mem_id_let      = $_POST['mem_id_letter'];
    $nationality     = $_POST['nationality'];

    //$subscription      = $_POST['subscription'];
    $image      = $_POST['image'];
    $mod_date  = strtotime($date . "+ $days days");
    $expiry    = date("Y-m-d", $mod_date);
    $wait      = "no";
    $time      = $days * 86400;
    
    $exp_time = $time + strtotime($date);
    



    $current_mon = date("m",strtotime($date));

    $mem_id_letter = get_field('gym_location',$location,'id','mem_id_letter');


    $memid_query = "SELECT `newid` FROM `user_data` WHERE `gym_location`='$location' ORDER BY `id` DESC LIMIT 1";
    $get_memid = mysqli_query($con, $memid_query);

    if (mysqli_affected_rows($con) == 1) {
        while ($row_memid = mysqli_fetch_array($get_memid, MYSQLI_ASSOC)) {

            $fetchlast_mem  = substr($row_memid['newid'],3);
//            $fetchlast_mem = $row_memid['newid'];
            $add_mem = $fetchlast_mem + 1;

            if(strlen($add_mem)==1){
                $last_memid = $mem_id_letter.$current_mon.(sprintf("%02d", $add_mem));

            }else{
                $last_memid = $mem_id_letter.$current_mon.$add_mem;
            }

        }
    }
    else{

        $last_memid = $mem_id_letter.$current_mon.'01';

    }

            $p_id = $last_memid;
            
            $bal = $total - $paid;

if($image){
    $dataUrl = $image;

    list($meta, $content) = explode(',', $dataUrl);
          $content = base64_decode($content);

           $picture = 'profile_pic/'.$p_id.'.png';
          file_put_contents($picture, $content);
}
else{
    $picture = 'profile_pic/no_profile.gif';
}


    if(!empty($_FILES['proof']['name']))
    {
        $ext = explode('.',$_FILES['proof']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($full_name);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $p_id.'.'.$extension;
        $full_local_path = 'proof_img/'.$document_name;
        move_uploaded_file($_FILES['proof']['tmp_name'], $full_local_path);

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


    mysqli_query($con, "INSERT INTO user_data (newid,name,address,nationality,contact,email,pic_add,height,weight,joining,expiry_time,age,proof,proof_photo,other_proof,sex,wait,emg_name,emg_no,gym_location,sub_type,invoice) VALUES ('$p_id','$full_name','$address','$nationality','$contact','$email','$picture','$height','$weight','$date','$exp_time','$age','$proof','$full_local_path','$other_proof','$sex','yes','$emg_name','$emg_no','$location','$mem_type',$invoice)");


    mysqli_query($con, "INSERT INTO subsciption_temp (mem_id,name,sub_type,paid_date,total,discount,paid,expiry,invoice,sub_type_name,bal,exp_time,mop,card_no,renewal) VALUES ('$p_id','$full_name','$mem_type','$date','$total','$discount','$paid','$expiry','$invoice','$name_type','$bal','$exp_time','$mop','$card_no','yes')");


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

            mysqli_query($con, "INSERT INTO subsciption_temp_sub (mem_id,plan_id,expire_date,invoice) VALUES ('$p_id','$sub_details','$result_date','$invoice')");
        }
    }

            echo "<head><script>alert('New Member request has been sent. Please check your Dashboard. ,');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";

//            mysqli_query($con, "UPDATE user_data SET wait='no' WHERE wait='yes'");
//        }
//    }

//    include 'send_mail.php';
    
} else {
    echo "<head><script>alert('Profile NOT Added, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";
    
}
?>
