<?php
//$con = mysqli_connect('localhost','root','','full_calendar');

$serverName = "SQL5018.Smarterasp.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"DB_9AA85E_ERMTEST", "UID"=>"expo", "PWD"=>"abcd1234");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

/*$msg = '';
if( $conn ) {
    $msg = "Connection established.<br />";
}else{
    $msg = "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}*/
?>