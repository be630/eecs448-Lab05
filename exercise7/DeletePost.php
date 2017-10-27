<?php
	
	$data_base = new mysqli("mysql.eecs.ku.edu", "bedmondson", 'P@$$word.123', "bedmondson");
	
	if($data_base->connect_errno)
	{
		printf("Unable to reach server: %s\n", $data_base->connect_error);
		exit();
	}
	
	echo "<html><body>";
	
	$posts = $data_base->query("SELECT * FROM Posts");
	$flag = false;
	while($row = $posts->fetch_assoc())
	{
		if(isset($_POST[$row['post_id']]))
		{
			$flag = true;
		}
	}
		
	if(!$flag)
	{
		echo "No posts selected. Cannot delete";
		//add link to admin page
		exit();
	}
	
	$posts = $data_base->query("SELECT * FROM Posts");
	
	echo "Post Deleted! Deleted Posts show below";
	
	while($row = $posts->fetch_assoc())
	{
		if(isset($_POST[$row['post_id']]))
		{
			echo $row['post_id'] . "<br>";
			$delete = "DELETE FROM Posts WHERE post_id='" . $row['post_id'] . "'";
			$data_base->query($delete);
		}
	}
	
	//add page return here.
		
	
?>