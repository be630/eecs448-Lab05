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
	
	if($check_name->num_rows != 0)
	{
		echo "Username unavailable, please choose another one<br>";
		//add main page link later.
		$check_name->free();
		exit();
	}
	else
	{
		$new_add = "INSERT INTO Users (user_id) VALUES ('$new_username')";
		if($data_base->query($new_add) == true)
		{
			echo "Username created!<br>";
		}
		else
		{
			echo "Something went wrong: " . $data_base->error;
		}
		
		$data_base->close();
	}	
?>