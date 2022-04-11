
<?php

if($_POST['function']=='user-delete'){
	
	$uid = strval($_POST['id']);
	
	
	$link = mysqli_connect("localhost", "root", "admin", "z_fitness_club");

	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
		echo "DB connection Error.";
	}

	// Attempt insert query execution
	$sql = "DELETE FROM customer WHERE id='$uid'";

	if(mysqli_query($link, $sql)){
		echo "User Deleted successfully.";
	} else {
		 echo "ERROR: Could not Delete, ".mysqli_error($link);
		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);
	
}
elseif($_POST['function']=='user-update'){
	$uid = strval($_POST['id']);
	
	$link = mysqli_connect("localhost", "root", "admin", "z_fitness_club");
	
	$sql = "SELECT * FROM customer where id='$uid'";
	
	$result = mysqli_query($link, $sql);
	
	$row =mysqli_fetch_array($result);
	
	// Close connection
	mysqli_close($link);
	
	echo json_encode($row);
	
}



?>