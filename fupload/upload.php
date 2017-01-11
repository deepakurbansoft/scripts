<?php


if(!empty($_FILES['photo']['name']))
{
    $target_dir = "upload_img/";
    $target_file = $target_dir . strtolower(basename($_FILES["photo"]["name"]));
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
//        echo "Sorry, there was an error uploading your file.";
    }

    $companylogo=strtolower(basename( $_FILES["photo"]["name"])); // used to store the filename in a variable



}

?>