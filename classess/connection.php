<?php
    $HOST 	 = 'localhost';    // Your Database Server Hostname
	$USER   = 'root';		// Your Database Username
	$PASS   = '';			// Your Database User Password
	$DB     = 'ambica';	// Your Database Name
	$SUFFIX = 'am_';
	$SITE_PATH='http://127.0.01/ambica_new/';
	
	
	   try
		{
			 $con = mysql_connect($HOST,$USER,$PASS) or die("Could not connect database");
             $db=mysql_select_db($DB, $con) or die("Could not select database");
		}
		catch (Exception $e)
		{
			echo "Caught exception: " . $e->getMessage() . "\n";
			exit;
		}
		
		// verify the mysql connection is correct
		if ($db==0)
		{
			mail("jigarpandya7375@gmail.com", "India Recipe's Database Error", "Database connection error: " . mysqli_error(), "From: indianrecipe.6te.net\r\n");
			die("There has been a technical error the webmaster has been informed, please try again shortly.");
		}
	
?>