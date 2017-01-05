<?php
	session_start();
	
	// Database Connection
	include('connection.php');
	
	// Calendar Class
	include('calendar.php');
	
	// Search
	if(isset($_POST['search']) && strlen($_POST['search']) !== 0)
	{
		$_SESSION['condition'] = " title OR description LIKE '%".$_POST['search']."%'";	
	}
	
	// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name', [$condition]
	if(isset($_POST['filter']) && !strlen($_POST['filter']) !== 0)
	{
		$filter = $_POST['filter'];
		$_SESSION['filter'] = $filter;
		if($filter == 'all-fields')
		{
			$_SESSION['condition'] = false;
		} else {
			$_SESSION['condition'] = "category = '".$filter."'";	
		}
		
		$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition']);
	} elseif(isset($_SESSION['condition']) && strlen($_SESSION['condition']) !== 0) {
		$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition']);
	} else {
		$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);		
	}
	
	// Set Categories
	if(isset($categories))
	{
		$calendar->categories = $categories;
	} else {
		$calendar->categories = array('General');	
	}
	
?>