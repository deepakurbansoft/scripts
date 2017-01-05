<?php
include('config.php');

$type = $_POST['type'];

if($type == 'new')
{
	$startdate = $_POST['startdate'].'+'.$_POST['zone'];
	$title = $_POST['title'];
	$insert = mysqli_query($con,"INSERT INTO calendar(`title`, `startdate`, `enddate`, `allDay`) VALUES('$title','$startdate','$startdate','false')");
	$lastid = mysqli_insert_id($con);
	echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($type == 'changetitle')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'resetdate')
{
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$eventid = $_POST['eventid'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'remove')
{
	$eventid = $_POST['eventid'];
	$delete = mysqli_query($con,"DELETE FROM calendar where id='$eventid'");
	if($delete)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'fetch')
{

//	$str = "hello";

	$crm_sql = "SELECT * FROM DB_9AA85E_ERMTEST.DBO.GETUPDATEDEVENTS('2000-01-01 12:00 PM') where ID > 0 ";


	$stmt = sqlsrv_query( $conn, $crm_sql);

	$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ;

	array_map(function($row){
		$ret = $row;
		$ret['Event_Name'] = $ret['Title'];
		unset($ret['Title']);
		return $ret;
	}, $tag);

//	$str = var_dump($row);
//	return $str;

//	$events = array();
//	$query = mysqli_query($con, "SELECT * FROM calendar");
//	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))
//	{
//	$e = array();
//    $e['id'] = $fetch['id'];
//    $e['title'] = $fetch['title'];
//    $e['start'] = $fetch['startdate'];
//    $e['end'] = $fetch['enddate'];
//
//    $allday = ($fetch['allDay'] == "true") ? true : false;
//    $e['allDay'] = $allday;
//
//    array_push($events, $e);
		echo json_encode($ret);

}


?>