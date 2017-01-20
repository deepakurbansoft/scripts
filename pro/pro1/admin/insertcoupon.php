<?php
include("db.php");
session_start();

	 $itemname = $_POST['itemname'];
	 $dollarvalue = $_POST['dollarvalue'];
	 $couponprice = $_POST['couponprice'];
	 $coupanimg = $_POST['coupanimg'];
	 $company_id = $_POST['company'];
	 $is_featured = $_POST['featured'];
	 $details = $_POST['details'];

if(isset($_POST['submit'])) {

	//coupon img uploadOk
	
//	$target_dirr = "couponimages/";
//    $target_file = $target_dirr . basename($_FILES["couponimageup"]["name"]);
//    $uploadOk = 1;
//    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//
//    if (move_uploaded_file($_FILES["couponimageup"]["tmp_name"], $target_file)) {
//
//    } else {
//
//    }

    if(!empty($_FILES['couponimageup']['name']))
    {
        $ext = explode('.',$_FILES['couponimageup']['name']);
        $extension = $ext[1];
        $img_lower = strtolower($itemname);
        $img_name = str_replace(' ','_',$img_lower);

        $document_name = $img_name.'_'.time().'.'.$extension;
        $full_local_path = 'couponimages/'.$document_name;
        move_uploaded_file($_FILES['couponimageup']['tmp_name'], $full_local_path);

    }


//    $couponimage=basename( $_FILES["couponimageup"]["name"]); // used to store the filename in a variable
//    $image=basename( $_FILES["couponimageup"]["name"]); // used to store the filename in a variable


//    $im = imagecreatefromjpeg('couponimages/'.$document_name);

// First we create our stamp image manually from GD
//    $stamp = imagecreatetruecolor(160, 60);
//imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
//imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
//    $im = imagecreatefromjpeg('couponimages/'.$document_name);
//    imagestring($stamp, 25, 20, 20, 'Not Redeemable', 0xFFFFFF);
//imagestring($stamp, 3, 20, 40, '(c) 2007-9', 0x0000FF);

// Set the margins for the stamp and get the height/width of the stamp image
//    $marge_right = 10;
//    $marge_bottom = 10;
//    $sx = imagesx($stamp);
//    $sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
//    imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

// Save the image to file and free memory
//    imagepng($im, 'couponimages/'.$document_name);
//    imagedestroy($im);


    if($is_featured == 1){
        mysql_query("UPDATE `list` SET `featured` = 0 WHERE company_id = $company_id");
    }

	//storind the data in your database
    $query= "INSERT INTO list (item_name,dollar_value,coupon_price,coupon_img,company_id,featured,featured_home,firstpage_coupon,created_date,details) VALUES ('$itemname','$dollarvalue','$couponprice','$document_name','$company_id','$is_featured','0','0',now(),'$details')";


    mysql_query($query);



    echo "<meta http-equiv='refresh' content='0; url=couponlist'>";
}

?>