<?php
//echo "hi";
include("db.php");
$del_id = $_GET['id'];
$delete_data = "DELETE FROM list WHERE id='$del_id'";
$delete = mysql_query($delete_data);
if($delete)
{

 echo "<meta http-equiv='refresh' content='0; url=couponlist'>";
}
?>