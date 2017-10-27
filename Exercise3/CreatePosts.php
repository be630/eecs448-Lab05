<?php
	echo "<html><body>";
	
	$username = $_POST["username"];
	$post = $_POST["userpost"];
	
	$data_base = new mysqli("mysql.eecs.ku.edu", "bedmondson", 'P@$$word.123', "bedmondson");
	
	if($data_base->connect_errno)
	{
		printf("Unable to reach server: %s\n", $data_base->connect_error);
		exit();
	}
	
	if(strlen($username) == 0)
	{
		echo "Username was blank. Try again.";
		//add main page exit later.
		exit();
	}
	if(strlen($post) == 0)
	{
		echo "Post was blank. Try again.";
		//add main page exit later.
		exit();
	}
	
	$check_string = "SELECT user_id FROM Users WHERE user_id='$username'";
	$check_name = $data_base->query($check_string);
	
	if($check_name->num_rows == 0)
	{
		echo "Username not found, please try again.<br>";
		//add main page link later.
		$check_name->free();
		exit();
	}
	else
	{
		$post_add = "INSERT INTO Posts (content, author_id) VALUES ('$post','$username')";
		if($data_base->query($post_add) == true)
		{
			echo "Post added!<br>";
		}
		else
		{
			echo "Something went wrong: " . $data_base->error;
		}
		
		$data_base->close();
		//add a page link here later
		echo "</body></html>";
	}	
?>