<?php
include("db.php");

extract($_POST);

if(!empty($_FILES['couponimageup']['name']))
{

    $target_dirr = "couponimages/";
    $target_file = $target_dirr . basename($_FILES["couponimageup"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["couponimageup"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["couponimageup"]["name"]). " has been uploaded.";
    } else {
//        echo "Sorry, there was an error uploading your file.";
    }

    $couponimage=basename( $_FILES["couponimageup"]["name"]); // used to store the filename in a variable
//    $image=basename( $_FILES["couponimageup"]["name"]); // used to store the filename in a variable

    mysql_query("UPDATE list SET  coupon_img='$couponimage' WHERE id='$id'");

}

if($featured == 1){
    mysql_query("UPDATE `list` SET `featured` = 0 WHERE company_id = $company");
}

$update_sql = "UPDATE `list` SET `item_name` = '$itemname', `dollar_value` = '$dollarvalue', `coupon_price` = '$couponprice', `company_id` = '$company', `featured` = '$featured', `details`='$details' WHERE `id` = $id;";
mysql_query($update_sql);

echo "<meta http-equiv='refresh' content='0; url=couponlist'>";
?>