<?php

	// Right Away on Login
	if(isset($_POST['username']) && isset($_POST['password'])) 
	{ 
		$ok = authenticate($_POST['username'], $_POST['password'], USERS_TABLE);
		
		if($ok == false)
		{
			$_SESSION['c_loginMessage'] = 'Invalid Credentials';
			header('Location: login.php');
			exit();		
		} elseif(in_array('error_found', $ok)) {
			$_SESSION['c_loginMessage'] = $ok['error'];
			header('Location: login.php');
			exit();
		}
	}
	
	// Will check all pages that does need authentication - direct access example
	// The current pages are those to skip authentication
	if(
		basename($_SERVER['PHP_SELF']) !== 'login.php'
	)
	{
		if(!isset($_SESSION['c_username']) && !isset($_SESSION['c_authenticated']) && $_SESSION['c_authenticated'] !== 'true') 
		{
			$_SESSION['c_loginMessage'] = 'Failed to log in';
			header('Location: login.php');
			exit();	
		}
	}
	
?>
<?php
	
	// Session Related Functions
	
	function authenticate($username, $password, $user_table)
	{
		mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		mysql_select_db(DATABASE);
		
		if($username && $password) 
		{
			$query = sprintf("SELECT * FROM %s WHERE username = '%s' and password = '%s' LIMIT 1", 
								mysql_real_escape_string($user_table),
								mysql_real_escape_string($username), 
								mysql_real_escape_string(sha1($password))
							);
			$result = mysql_query($query);
			
			$results = mysql_fetch_assoc($result);

			// gave a result and was authenticated
			if(!empty($results))
			{
				$_SESSION['c_username'] = $username;
				$_SESSION['c_authenticated'] = 'true';
				return $results;		
			} elseif(mysql_error()) {
				 return array('error_found' => 'true', 'error' => mysql_error());
			} else {
				return false;	
			}
			
		}	
	}
	
	function add_user($username, $password, $user_table)
	{
		mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		mysql_select_db(DATABASE);
		
		$query = sprintf('INSERT INTO %s SET username = "%s", password = "%s"', 
							mysql_real_escape_string($user_table),
							mysql_real_escape_string($username), 
							mysql_real_escape_string(sha1($password))
						);
						
		$result = mysql_query($query);
		
		if($result)
		{
			return true;	
		} else {
			return false;
		}
				
	}
	
?>