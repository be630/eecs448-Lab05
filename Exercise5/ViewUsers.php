<?php
	echo "<html><body>";

	$data_base = new mysqli("mysql.eecs.ku.edu", "bedmondson", 'P@$$word.123', "bedmondson");
	
	if($data_base->connect_errno)
	{
		printf("Unable to reach server: %s\n", $data_base->connect_error);
		exit();
	}
	
	$tableinfo = $data_base->query("SELECT * FROM Users");
	if($tableinfo->num_rows == 0)
	{
		echo "No Users Found";
		//add main page exit later.
		exit();
	}
	else
	{
		echo "Users:";
		
		while($row = mysqli_fetch_array($tableinfo))
		{
			echo "<br>" . $row['user_id'];
		}
	}
		
		$data_base->close();
		//add a page link here later
		echo "</body></html>";	
?>