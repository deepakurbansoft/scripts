<?php
include("db.php");


extract($_POST);


if(!empty($_FILES['company_logo']['name']))
{
    $target_dir = "companylogos/";
    $target_file = $target_dir . strtolower(basename($_FILES["company_logo"]["name"]));
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["company_logo"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
//        echo "Sorry, there was an error uploading your file.";
    }

    $companylogo=strtolower(basename( $_FILES["company_logo"]["name"])); // used to store the filename in a variable
//    $image=basename( $_FILES["imageUpload"]["name"]); // used to store the filename in a variable

    mysql_query("UPDATE company SET  logo='$companylogo' WHERE id='$id'");

}




$update_sql = "UPDATE company SET `name` = '$company_name' WHERE `id` = $id;";
mysql_query($update_sql);

echo "<meta http-equiv='refresh' content='0; url=company'>";
?>