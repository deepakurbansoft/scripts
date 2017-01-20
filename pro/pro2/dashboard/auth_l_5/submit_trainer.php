<?php
require 'db_conn.php';
page_protect();


    $name    = rtrim($_POST['name']);
    $user_name    = rtrim($_POST['user_name']);
    $mobile = rtrim($_POST['mobile']);
    $email    = rtrim($_POST['email']);
    $gym_location    = $_POST['gym_location'];
    $password    = $_POST['password'];
    $gender    = $_POST['gender'];
    $user_type   = $_POST['user_type'];
    $image   = $_POST['image'];

//if($name && $user_name && $mobile && $gym_location && $password && $gender && $user_type){

//    $check_user = 1;

    $check_user = get_row('auth_user','login_id',$user_name);

    if($check_user!=0){


        echo "<head><script>alert('User Already Exist.');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=new_user.php'>";

//    $form_data['success'] = false;
//
//    $form_data['message'] = 'User Name already exist';
    }

    else{

        if($image){
            $dataUrl = $image;

            list($meta, $content) = explode(',', $dataUrl);
            $content = base64_decode($content);

            $picture = 'user_img/'.$user_name.'.png';
            file_put_contents($picture, $content);
        }
        else{
            $picture = 'men-ava.jpg';
        }

        mysqli_query($con, "INSERT INTO auth_user (login_id,pass_key,level,sex,name,mobile,email,gym_location,profile_photo,auth_type) VALUES ('$user_name','$password','5','$gender','$name','$mobile','$email','$gym_location','$picture','$user_type')");

        echo "<head><script>alert('User Added.');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=manage_users.php'>";

//        echo "INSERT INTO auth_user (login_id,pass_key,level,sex,name,mobile,email,gym_location,profile_photo,auth_type) VALUES ('$user_name','$password','5','$gender','$name','$mobile','$email','$gym_location','$picture','$user_type')";

//        $form_data['success'] = true;

//        $form_data['message'] = 'Success';


    }
//}




//echo json_encode($form_data);





?>
