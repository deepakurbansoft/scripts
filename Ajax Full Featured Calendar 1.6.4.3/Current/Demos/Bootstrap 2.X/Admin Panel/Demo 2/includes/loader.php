<?php
	session_start();
	
	// Database Connection
	include('connection.php');
	
	// Calendar Class
	include('calendar.php');
	
	// Embed Class
	include('embed.php');
	
	// Formater Class
	include('formater.php');
	
	// Session Manager (Use your own session file)
	// Register Protected Pages for session Manager
	if(
		basename($_SERVER['PHP_SELF']) == "login.php" ||
		basename($_SERVER['PHP_SELF']) == "dashboard.php" ||
		basename($_SERVER['PHP_SELF']) == "add_event.php" ||
		basename($_SERVER['PHP_SELF']) == "user.php"
	)
	{
		include('session.php');
	}
	
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