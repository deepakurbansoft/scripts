<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['p_id'])) {
    
    
//    $date      = $_POST['date'];
    $age       = rtrim($_POST['age']);
    $full_name = rtrim($_POST['p_name']);
    $email     = rtrim($_POST['email']);
    $address   = rtrim($_POST['add']);
    $contact   = rtrim($_POST['contact']);
    $height    = rtrim($_POST['height']);
    $weight    = rtrim($_POST['weight']);
    $proof    = rtrim($_POST['proof']);
    $gender    = rtrim($_POST['sex']);
    $emg_name    = rtrim($_POST['emg_name']);
    $emg_no    = rtrim($_POST['emg_no']);

    $p_id = $_POST['p_id'];


    if(!empty($_FILES['photo']['name']))
    {
        $ext = explode('.',$_FILES['photo']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($full_name);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $img_name.'_'.time().'.'.$extension;
        $full_local_path = 'profile_pic/'.$document_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $full_local_path);

        mysqli_query($con, "UPDATE user_data SET pic_add='$full_local_path' WHERE newid='$p_id'");
//        echo "UPDATE user_data SET pic_add='$full_local_path' WHERE newid='$p_id'";
    }

    if(!empty($_FILES['proof']['name']))
    {
        $ext = explode('.',$_FILES['proof']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($full_name);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $img_name.'_'.time().'.'.$extension;
        $full_local_path = 'proof_img/'.$document_name;
        move_uploaded_file($_FILES['proof']['tmp_name'], $full_local_path);

        mysqli_query($con, "UPDATE user_data SET proof_photo='$full_local_path' WHERE newid='$p_id'");
//        echo "UPDATE user_data SET pic_add='$full_local_path' WHERE newid='$p_id'";
    }


    
    mysqli_query($con, "UPDATE user_data SET name='$full_name', address='$address', contact='$contact', email='$email', height='$height', weight='$weight', age='$age', proof='$proof', sex='$gender', emg_name='$emg_name', emg_no='$emg_no' WHERE newid='$p_id'");

//    echo "UPDATE user_data SET name='$full_name', address='$address', contact='$contact', email='$email', height='$height', weight='$weight', joining='$date', age='$age', proof='$proof', sex='$gender', emg_name='$emg_name', emg_no='$emg_no' WHERE newid='$p_id'";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
} else {
    echo "<head><script>alert('Profile NOT Updated, Check Again');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
    
}
?>
