<?php
include("db.php");
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{

$username=mysql_real_escape_string($_POST['username']); 

$password=mysql_real_escape_string($_POST['password']); 

//$result=mysql_query("SELECT * FROM register WHERE username='$username' or email = '$username' and password='$password'");
$result=mysql_query("SELECT * FROM admin_login WHERE  name = '$username' and password='$password'");
$count=mysql_num_rows($result);

$row=mysql_fetch_array($result);

if($count==1)
{
$_SESSION['login_user']=$row['id'];
$_SESSION['login_username']=$row['name'];
echo $row['id'];
}

}
?>