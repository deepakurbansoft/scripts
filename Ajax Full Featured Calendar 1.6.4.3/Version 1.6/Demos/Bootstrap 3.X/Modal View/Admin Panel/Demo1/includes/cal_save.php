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
	$allDay = $_POST['allDay'];
	$url = $_POST['url'];
	
	$extraArray['user_id'] = get_user("ID");
	
	// Category Handler - Core
	if(isset($_POST['categorie']) && strlen($_POST['categorie']) !== 0)
	{
		$extraArray['categorie'] = $_POST['categorie'];
	} else {
		$categorie = false;	
	}

	// Add Event - Core
	echo $calendar->addEvent($title, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, $url, $extraArray);
	

?>