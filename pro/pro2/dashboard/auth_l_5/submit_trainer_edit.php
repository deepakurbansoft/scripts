<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['id'])) {
    
    $name    = rtrim($_POST['name']);
    $mobile = rtrim($_POST['mobile']);
    $email    = rtrim($_POST['email']);
    $gym_location    = rtrim($_POST['gym_location']);
    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    if(!empty($_FILES['photo']['name']))
    {
        $ext = explode('.',$_FILES['photo']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($name);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $img_name.'_'.time().'.'.$extension;
        $full_local_path = 'user_img/'.$document_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $full_local_path);
        mysqli_query($con, "UPDATE auth_user SET  profile_photo='$full_local_path' WHERE id='$id'");

//        echo "UPDATE auth_user SET  profile_photo='$full_local_path' WHERE id='$id'";
    }


    mysqli_query($con, "UPDATE auth_user SET  name='$name', mobile='$mobile', email='$email', gym_location='$gym_location', sex='$gender', pass_key='$password' WHERE id='$id'");

    echo "<meta http-equiv='refresh' content='0; url=manage_users.php'>";
} else {
    echo "<head><script>alert('Profile NOT Updated, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=manage_users.php'>";
    
}
?>
