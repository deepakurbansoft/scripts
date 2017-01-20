 <?php

 $host = "localhost"; // Host name
 $username = "root"; // Mysql username
 $password = ""; // Mysql password
 $db_name = "gym"; // Database name

 $con      = mysqli_connect($host, $username, $password, $db_name);


 if (mysqli_connect_errno($con)) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $query  = "select * from mail_settings WHERE 1";
 //echo $query;
 $result = mysqli_query($con, $query);

 if (mysqli_affected_rows($con) != 0) {

     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

         if($row['5days']==1){

            $five_days = 1;
         }

         if($row['15days']==1){

             $fifteen_days = 1;
         }

         if($row['30days']==1){

             $thirty_days = 1;
         }
     }
 }

$query  = "select * from subsciption WHERE 1";
//echo $query;
$result = mysqli_query($con, $query);

if (mysqli_affected_rows($con) != 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $expiry_date = $row['expiry'];
        $user_id = $row['mem_id'];
        $name_type = $row['sub_type_name'];

        $current_date = date("Y-m-d");

        $date1 = date_create($expiry_date);
        $date2 = date_create($current_date);
        $diff = date_diff($date1, $date2);
        $day_count = $diff->format("%a");
//       echo $day_count = 30;

        if ($day_count == 5 && $five_days == 1) {

            $user_query = "SELECT * From `user_data` WHERE `newid` = '$user_id'";


            $user_result = mysqli_query($con, $user_query);

            while ($get_user = mysqli_fetch_array($user_result, MYSQLI_ASSOC)) {

                $full_name = $get_user["name"];
                $email = $get_user["email"];
                $p_id = $get_user["newid"];
                $from_date = $get_user["joining"];


                include 'sendmail_subscription.php';



            }
        }

        elseif ($day_count == 15 && $fifteen_days == 1) {

            $user_query = "SELECT * From `user_data` WHERE `newid` = '$user_id'";

            $user_result = mysqli_query($con, $user_query);

            while ($get_user = mysqli_fetch_array($user_result, MYSQLI_ASSOC)) {

                $full_name = $get_user["name"];
                $email = $get_user["email"];
                $p_id = $get_user["newid"];
                $from_date = $get_user["joining"];


                include 'sendmail_subscription.php';



            }
        }

        elseif ($day_count == 30 && $thirty_days == 1){

            $user_query = "SELECT * From `user_data` WHERE `newid` = '$user_id'";

            $user_result = mysqli_query($con, $user_query);

            while ($get_user = mysqli_fetch_array($user_result, MYSQLI_ASSOC)) {

                $full_name = $get_user["name"];
                $email = $get_user["email"];
                $p_id = $get_user["newid"];
                $from_date = $get_user["joining"];


                include 'sendmail_subscription.php';



            }

        }
    }
}