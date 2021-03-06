<?php

	// Loader - class and connection
	include('loader.php');
	
	if(isset($_POST['method']) && $_POST['method'] == 'export') {
		// Catch data from javascript
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$start_date = date('Ymd\This', strtotime($_POST['start_date']));
		$end_date = date('Ymd\This', strtotime($_POST['end_date']));
		
		$start_date = $start_date.'Z';
		$end_date = $end_date.'Z';
		
		if(isset($_POST['url']) && strlen($_POST['url']) !== 0) { $url = $_POST['url']; }
		
		$data = $calendar->icalExport($id, $title, $description, $start_date, $end_date, $url);	
		file_put_contents(getcwd().DIRECTORY_SEPARATOR.'Event-'.$id.'.ics', $data);
	} else {
		$id = $_POST['id'];
		if(file_exists(getcwd().DIRECTORY_SEPARATOR.'Event-'.$id.'.ics')) {
			@unlink(getcwd().DIRECTORY_SEPARATOR.'Event-'.$id.'.ics');
		}
	}

	


?>