<?php

	$data_base = new mysqli("mysql.eecs.ku.edu", "bedmondson", 'P@$$word.123', "bedmondson");
	
	if($data_base->connect_errno)
	{
		printf("Unable to reach server: %s\n", $data_base->connect_error);
		exit();
	}
	
	echo "<html><body>";
	
	$usertoview = $_POST['user'];
	$tablecheck = "SELECT * FROM Users WHERE user_id='" . $usertoview . "'";
	$tableresult = $data_base->query(tablecheck);
	$row = $tableresult->fetch_assoc();
	$author = $row["user_name"];
	$finalresult = $data_base->query("SELECT content From Posts WHERE author_id='" . $author . "'");
	
	if($finalresult->num_rows == 0)
	{
		echo "No posts found for " . $usertoview . "";
		//add main page exit later.
		exit();
	}
	else
	{
		echo "" . $usertoview . "'s Posts";
		
		while($row = $finalresult->fetch_assoc())
		{
			echo "<br>" . $row["content"] . "<br><br>";
		}
		
		//add page link
	}
		
		$data_base->close();
		echo "</body></hmtl>";
?>