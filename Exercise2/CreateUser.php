<?php

	$new_username = $_POST["username"];
	
	$data_base = new mysqli("mysql.eecs.ku.edu", "bedmondson", 'P@$$word.123', "bedmondson");
	
	if($data_base->connect_errno)
	{
		printf("Unable to reach server: %s\n", $data_base->connect_error);
		exit();
	}
	
	if(strlen($new_username) == 0)
	{
		echo "Username was blank. Try again.";
		//add main page exit later.
		exit();
	}
	
	$check_string = "SELECT user_id FROM Users WHERE user_id='$new_username'";
	$check_name = $data_base->query($check_string);
?>