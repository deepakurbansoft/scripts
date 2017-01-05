<?php

	// Loader - class and connection - Core
	include('loader.php');
	
	// Catch start, end and id from javascript - Core
	$title = $_POST['title'];
	$description = $_POST['description'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_date = $_POST['end_date'];
	$end_time = $_POST['end_time'];
	$color = $_POST['color'];
	$allDay = 'true';
	$url = $_POST['url'];
	
	// Category Handler - Core
	if(isset($_POST['categorie']) && strlen($_POST['categorie']) !== 0)
	{
		$extraArray['categorie'] = $_POST['categorie'];
	} else {
		$categorie = false;	
	}
	
	$extraArray['user_id'] = get_user("ID");
	
	// Add Event Handler - Core
	if(empty($title) && empty($description)) {
		echo 'Fields cannot be empty';	
	} else {
		echo $calendar->addEvent($title, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, $url, $extraArray);
	}
	

?>