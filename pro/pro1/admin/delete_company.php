<?php
//echo "hi";
include("db.php");
$del_id = $_GET['id'];
//$folder_name = $_GET['folder-name'];

$check_company = mysql_query("SELECT * FROM `company` WHERE `id` = '$del_id'");

while($get_company = mysql_fetch_assoc($check_company))
{
  $folder_name = $get_company['folder_name'];
  $image_name = $get_company['logo'];
}

$company_query = mysql_query("SELECT * FROM `list` WHERE `company_id` = '$del_id'");

if(mysql_num_rows($company_query)==0){

 $delete_data = "DELETE FROM company WHERE id='$del_id'";
 $delete = mysql_query($delete_data);

 if($delete)
 {

  $filename = '../'.$folder_name .'/index.php';
  unlink($filename);
  unlink('companylogos/'.$image_name);

  $path = '../'.$folder_name;

  if (is_dir($path)) {
   rmdir($path);
  }

  echo "<meta http-equiv='refresh' content='0; url=company'>";
 }
}else{

echo '<script>alert("This Company have Coupons. Please Delete coupons and continue.")</script>';
 echo "<meta http-equiv='refresh' content='0; url=company'>";
}


?>