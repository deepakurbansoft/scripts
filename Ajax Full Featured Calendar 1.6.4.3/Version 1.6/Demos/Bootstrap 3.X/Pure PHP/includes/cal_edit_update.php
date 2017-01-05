<?php

	// Loader - class and connection
	include('loader.php');
	
	// Catch start, end and id from javascript
	$id = $_POST['id'];
	$event_title = $_POST['title_update'];
	$event_description = $_POST['description_update'];
	
	if(isset($_POST['url_update'])) {
		$url = $_POST['url_update'];
	} else {
		$url = '?page=';	
	}
	
	if($calendar->updates($id, $event_title, $event_description, $url) === true) {
		return true;	
	} else {
		return false;	
	}

?>